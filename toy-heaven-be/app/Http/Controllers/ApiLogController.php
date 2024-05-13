<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiLogController extends Controller
    {
    public function store(Request $request)
    {
        \Log::info("Received logging request"); // Logga l'entrata nella funzione
        $log = $request->input('message');
        if (!$log) {
            return response()->json(['message' => 'No log data provided'], 400);
        }

        try {
            // Controlla e crea la directory 'logs' se non esiste
            if (!Storage::disk('local')->exists('logs')) {
                Storage::disk('local')->makeDirectory('logs');
            }

            // Appendi il log al file
            Storage::disk('local')->append('logs/api_performance.log', $log);
        } catch (\Exception $e) {
            \Log::error("Failed to write log: " . $e->getMessage());
            return response()->json(['message' => 'Failed to store log', 'error' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Log stored successfully'], 200);
    }

}