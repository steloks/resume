<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CollectTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collect:translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan project for translations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $translationData = [
            'appFiles'       => Storage::disk('appFiles')->allFiles(),
            'appFilesEmails' => Storage::disk('appFilesEmails')->allFiles(),
            'resourceViews'  => Storage::disk('resourceViews')->allFiles(),
        ];
        $files           = $translationData;
        $translationFile = 'default.json';
        $inserted        = [];
        if (file_exists($translationFile)) {
            unlink($translationFile);
        }
        $collected = collect(json_decode(file_get_contents(base_path('resources/data/menus/vertical-menu.json'))))->flatten();
        $names = $collected->pluck('name')->toArray();
        $otherNames =  $collected->pluck('navheader')->toArray();
        $submenu = $collected->pluck('submenu')->flatten()->pluck('name')->toArray();
        $all = array_filter(array_merge($names, $otherNames, $submenu));
        foreach ($files as $diskName => $file) {
            foreach ($file as $data) {
                $content = Storage::disk($diskName)->get($data);
                if (preg_match_all("/__\(\'(.+?)'\)/", $content, $matches) && isset($matches[1])) {
                    $matches[1] = array_merge($matches[1], $all);
                    foreach ($matches[1] as $match) {
                        if (!in_array($match, $inserted, true)) {
                            $inserted[$match] = json_decode(json_encode($match, JSON_UNESCAPED_UNICODE));
                            Storage::disk('translations')
                                   ->put($translationFile,
                                       json_encode($inserted, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                        }
                    }
                }
            }
        }

        $this->info('Successful execution!');
        $this->info('Translation file is in ' . resource_path('lang') . ' -> ' . $translationFile);

        return 0;
    }
}
