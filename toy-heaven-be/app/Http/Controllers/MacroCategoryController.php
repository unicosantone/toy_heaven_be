<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MacroCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MacroCategoryController extends Controller
{
    public function getAllMacroCategories()
    {
        try {
            $macroCategories = MacroCategory::all();
            return response()->json($macroCategories, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getMacroCategory($id)
    {
        try {
            $macroCategory = MacroCategory::find($id);

            if (!$macroCategory) {
                return response()->json(['fail' => 'Elemento non trovato'], 404);
            }

            return response()->json($macroCategory, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'label_ita' => 'required|string',
                'label_eng' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['fail' => $validator->errors()], 422);
            }

            $macroCategory = MacroCategory::create($request->all());

            return response()->json(['success' => 'Elemento inserito con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function editMacroCategory(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'label_ita' => 'string',
                'label_eng' => 'string',
            ]);

            if ($validator->fails()) {
                return response()->json(['fail' => $validator->errors()], 422);
            }

            $macroCategory = MacroCategory::find($id);

            if (!$macroCategory) {
                return response()->json([
                    'status'=>'error',
                    'message' => 'Elemento non trovato'
                ], 404);
            }

            $macroCategory->update($request->all());

            return response()->json(['success' => 'Elemento aggiornato con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteMacroCategory($id)
    {
        try {
            $macroCategory = MacroCategory::find($id);

            if (!$macroCategory) {
                return response()->json(['fail' => 'Elemento non trovato'], 404);
            }

            $macroCategory->delete();

            return response()->json(['success' => 'Elemento eliminato con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
