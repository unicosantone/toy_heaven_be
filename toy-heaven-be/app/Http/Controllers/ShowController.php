<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ShowController extends Controller
{
    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'start_date' => 'required | date',
                'end_date' => 'required | date',
                'description_ita' => 'required|string',
                'description_eng' => 'required|string',
                'link' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['fail' => $validator->errors()], 422);
            }

            $show = Show::create($request->all());

            return response()->json(['success' => 'Fiera inserita con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function getAllShow()
    {
        try {
            $shows = Show::all();
            return response()->json(['success' => $shows], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getShow($id)
    {
        try {
            $show = Show::findOrFail($id);
            return response()->json(['success' => $show], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function editShow(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'description_ita' => 'required|string',
                'description_eng' => 'required|string',
                'link' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['fail' => $validator->errors()], 422);
            }

            $show = Show::findOrFail($id);
            $show->update($request->all());

            return response()->json(['success' => 'Fiera aggiornata con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteShow($id)
    {
        try {
            $show = Show::find($id);
            $show->delete();

            return response()->json(['success' => 'Fiera eliminata con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
