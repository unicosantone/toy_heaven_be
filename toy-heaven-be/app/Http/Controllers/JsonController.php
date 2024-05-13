<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class JsonController extends Controller
{
    public function readJson()
    {
        $path = storage_path() . "/fe_config.json"; // Assicurati che il percorso sia corretto
        if (!File::exists($path)) {
            return response()->json(['error' => 'Configurazione non trovata'], Response::HTTP_NOT_FOUND);
        }

        try {
            $json = File::get($path);
            return response($json)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Errore lettura configurazione file.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function writeJson(Request $request)
    {
        $path = storage_path() . "/fe_config.json"; 
        if (!File::exists($path)) {
            return response()->json(['error' => 'Configurazione non trovata'], Response::HTTP_NOT_FOUND);
        }

        try {
            $currentData = json_decode(File::get($path), true);
            $newData = $request->all();

            $updatedData = $this->arrayRecursiveMerge($currentData, $newData);

            File::put($path, json_encode($updatedData, JSON_PRETTY_PRINT)); 
            return response()->json($updatedData);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Errore aggiornamento configurazione.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function arrayRecursiveMerge($original, $new)
    {
        foreach ($new as $key => $value) {
            if (array_key_exists($key, $original) && is_array($value)) {
                $original[$key] = $this->arrayRecursiveMerge($original[$key], $new[$key]);
            } else {
                $original[$key] = $value;
            }
        }
        return $original;
    }
}
