<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ConditionController extends Controller
{

    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'label_ita' => 'required|string',
                'label_eng' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'=>'error',
                    'message' => $validator->errors()
                ], 422);
            }

            $condition = Condition::create([
                'label_ita' => $request->label_ita,
                'label_eng' => $request->label_eng,
            ]);

            if (!$condition) {
                return response()->json([
                    'status'=>'error',
                    'message' => 'Errore nella creazione della condizione'
                ], 422);
            }

            return response()->json(['success' => 'Condizione creata con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getAllConditions()
    {
        try {
            $conditions = Condition::all();

            return response()->json([$conditions], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getCondition($id)
    {
        try {
            $condition = Condition::find($id);

            if (!$condition) {
                return response()->json([
                    'status'=> 'error',
                    'message' => 'Condizione non trovata'
                ], 404);
            }

            return response()->json($condition, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()], 500);
        }
    }

    public function editCondition(Request $request, $id)
    {
        try {
            $condition = Condition::find($id);

            if (!$condition) {
                return response()->json(['fail' => 'Condizione non trovata'], 404);
            }

            $validator = Validator::make($request->all(), [
                'label_ita' => 'required|string',
                'label_eng' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'=>'error',
                    'message' => $validator->errors()
                ], 422);
            }

            $condition->update([
                'label_ita' => $request->label_ita,
                'label_eng' => $request->label_eng,
            ]);

            return response()->json(['success' => 'Condizione aggiornata con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteCondition($id)
    {
        try {
            $condition = Condition::find($id);

            if (!$condition) {
                return response()->json(['fail' => 'Condizione non trovata'], 404);
            }

            $condition->delete();

            return response()->json(['success' => 'Condizione eliminata con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()], 500);
        }
    }
}
