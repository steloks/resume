<?php

namespace App\PrintNode;

use Illuminate\Support\Facades\Http;

class PrintJobSender
{
    private $apiKey;
    private $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('PRINT_NODE_API_KEY');
        $this->apiUrl = "https://api.printnode.com";
    }

    private function getPrinterId(): ?int
    {
        $printers = Http::withBasicAuth('', $this->apiKey)->get($this->apiUrl . '/printers')->json();

        $printerId = null;
        foreach ($printers as $printer) {
            //here we can add logic about the different kitchens as they will use different printer
            if ($printer['default'] === true) { //for now just get the default one
                $printerId = $printer['id'];
            } else {
                $printerId = null;
            }
        }

        return $printerId;
    }

    public function addPrintJob($zpl, $jobName): bool
    {
        $printerId = $this->getPrinterId();

        if (is_array($zpl)) {
            $zpl = implode('', $zpl);
        }

        $response = Http::withBasicAuth('', env('PRINT_NODE_API_KEY'))->post('https://api.printnode.com/printjobs', [
            'printerId' => $printerId,
            'contentType' => "raw_base64",
            'content' => base64_encode($zpl),
            'title' => $jobName
        ]);

        return $response->status() == 201;
    }
}
