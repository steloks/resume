<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TranslationController extends Controller
{
    /**
     * TranslationController constructor.
     */
    public function __construct()
    {
        $this->showLocalesFromFiles();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $defaultTranslations = json_decode($this->getDefaultTranslations(), true);

        return view('admin.translations.index')->with([
            'translations' => $defaultTranslations,
            'pageHeading' => __('Translations'),
            'localesFromFiles' => $this->getLocalesFromFiles(),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $code
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getSpecific(Request $request, $code)
    {
        $localesFromFile = $this->getLocalesFromFiles();
        $localeFromInput = mb_strtolower($request->get('locale'));
        $localeFile = [];

        if (empty($localeFromInput) && empty($code)) {
            return redirect()
                ->route('admin.Translation::index')
                ->with(['errorMessage' => __('Cannot search by base locale.')]);
        }

        foreach ($localesFromFile as $localeFromFile) {
            if ((string)$code === (string)$localeFromFile) {
                $localeFile = Storage::disk('translations')->get($code . '.json');
            } else {
                if ((string)$localeFromInput === (string)$localeFromFile) {
                    $localeFile = Storage::disk('translations')->get($localeFromFile . '.json');
                }
            }
        }

        return view('admin.translations._partials.specific_locale')->with([
            'localesFromFile' => $localesFromFile,
            'localeFromInput' => !empty($localeFromInput) ? $localeFromInput : $code,
            'localeContents' => json_decode($localeFile, JSON_UNESCAPED_UNICODE),
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getTranslations(): \Illuminate\Http\RedirectResponse
    {
        $defaultJson = $this->getDefaultTranslations();
        if (empty($defaultJson)) {
            return redirect()
                ->route('admin.Translation::index')
                ->with(['errorMessage' => __('No base file found.')]);
        }

        $decodedDefaultJson = json_decode($defaultJson, true);
        $locales = $this->getLocales();

        foreach ($locales as $locale) {
            $file = "$locale.json";

            if (!Storage::disk('translations')->exists($file)) {
                Storage::disk('translations')->put($file, $defaultJson);
            } elseif ($file) {
                $currentFileContent = json_decode(Storage::disk('translations')->get($file), true);
                $arrayDiff = array_diff_key($decodedDefaultJson, $currentFileContent);
                $newFileContent = array_merge_recursive($currentFileContent, $arrayDiff);
                Storage::disk('translations')->put($file, json_encode($newFileContent, JSON_UNESCAPED_UNICODE));
            }
        }

        return redirect()->route('admin.Translation::index')->with([
            'message' => __('Collected translations: ') . count($decodedDefaultJson),
        ]);

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param null $code
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function searchByLocale(Request $request, $code = null)
    {
        $localesFromFile = $this->getLocalesFromFiles();
        $localeFromInput = mb_strtolower($request->get('locale'));
        $localeFile = [];

        if (empty($localeFromInput) && empty($code)) {
            return redirect()
                ->route('admin.Translation::index')
                ->with(['errorMessage' => __('Cannot search by base locale.')]);
        }

        foreach ($localesFromFile as $localeFromFile) {
            if ((string)$code === (string)$localeFromFile) {
                $localeFile = Storage::disk('translations')->get($code . '.json');
            } else {
                if ((string)$localeFromInput === (string)$localeFromFile) {
                    $localeFile = Storage::disk('translations')->get($localeFromFile . '.json');
                }
            }
        }

        return redirect()->route('admin.Translation::getSpecific', ['request' => $request, 'code' => $request->get('locale')]);
//old shit
//        return view('admin.translations._partials.locale_selected')->with([
//                'localesFromFile' => $localesFromFile,
//                'localeFromInput' => !empty($localeFromInput) ? $localeFromInput : $code,
//                'localeContents'  => json_decode($localeFile, JSON_UNESCAPED_UNICODE),
//            ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function saveTranslation(Request $request)
    {
        $translations = $request->get('translationsArr');
        $currentLocale = mb_strtolower($request->get('locale'));

        foreach ($translations as $key => $translation) {
            $localeTranslationKey = $key;
            $inputValue = $translation;
            $localeFileContents = Storage::disk('translations')->get($currentLocale . '.json');
            $localeCollection = collect(json_decode($localeFileContents,
                JSON_UNESCAPED_UNICODE))->put($localeTranslationKey, $inputValue);
            $localeArray = $localeCollection->toArray();
            Storage::disk('translations')->put($currentLocale . '.json',
                json_encode($localeArray, JSON_UNESCAPED_UNICODE));
        }

        session()->flash('savedTranslation', 'Successfully changed translation/translations.');

        return response()->json([
            'success' => true,
            'message' => __('Successfully changed translation.'),
            'translationMsg' => session('savedTranslation'),
        ]);
    }

    /**
     * @return string
     */
    private function getDefaultTranslations()
    {
        $defaultTranslations = Storage::disk('translations')->get('default.json');

        return $defaultTranslations;
    }

    /**
     * @return string
     */
    private function getLocales()
    {
        return collect(Locale::$locales)->pluck('code')->toArray();
    }

    /**
     * Get locales to show
     */
    public function showLocalesFromFiles()
    {
        \View::share('localesFromFile', $this->getLocalesFromFiles());
    }

    /**
     * @return array
     */
    public function getLocalesFromFiles()
    {
        $files = Storage::disk('translations')->allFiles();
        $filesLocale = str_replace('.json', '', $files);
        $localesFromFiles = [];

        foreach ($filesLocale as $fileLocale) {
            if (strlen($fileLocale) == 2) {
                $localesFromFiles[] = mb_strtolower($fileLocale);
            }
        }

        return $localesFromFiles;
    }
}
