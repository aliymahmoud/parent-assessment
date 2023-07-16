<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class JSONHelper
{
    public static function readDataFromJsonFile($fileName) {
        $path = Storage::path($fileName);
        $file = fopen($path, "r");
        $data = [];
        if ($file) {
            $jsonData = '';
            while (($line = fgets($file)) !== false) {
                $jsonData .= $line;
            }

            fclose($file);

            $data = json_decode($jsonData, true);
        }
        return $data;
    }
}