<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function getAllSubCategory()
    {
        try {
            $subCategories = SubCategory::all();
            return response()->json(['data'=>$subCategories], 200);
        } catch (\Exception $e) {
            return response()->json(['fail' => $e->getMessage()], 500);
        }
    }

    public function getSubCategory($id)
    {
        try {
            $subCategory = SubCategory::find($id);

            if (!$subCategory) {
                return response()->json(['fail' => 'Sottocategoria non trovata'], 404);
            }

            return response()->json(['data'=>$subCategory], 200);
        } catch (\Exception $e) {
            return response()->json(['fail' => $e->getMessage()], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'label_ita' => 'required|string',
                'label_eng' => 'required|string',
                'category_id' => 'required|exists:categories,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['fail' => $validator->errors()], 422);
            }

            $subCategory = SubCategory::create($request->all());

            return response()->json(['success' => 'Sottocategoria inserita con successo'], 200);
        } catch (\Exception $e) {
            return response()->json(['fail' => $e->getMessage()], 500);
        }
    }

    public function editSubCategory(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'label_ita' => 'string',
                'label_eng' => 'string',
                'category_id' => 'exists:categories,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['fail' => $validator->errors()], 422);
            }

            $subCategory = SubCategory::find($id);

            if (!$subCategory) {
                return response()->json(['fail' => 'Sottocategoria non trovata'], 404);
            }

            $subCategory->update($request->all());

            return response()->json(['success' => 'Sottocategoria aggiornata con successo'], 200);
        } catch (\Exception $e) {
            return response()->json(['fail' => $e->getMessage()], 500);
        }
    }

    public function deleteSubCategory($id)
    {
        try {
            $subCategory = SubCategory::find($id);

            if (!$subCategory) {
                return response()->json(['fail' => 'Sottocategoria non trovata'], 404);
            }

            $subCategory->delete();

            return response()->json(['success' => 'Sottocategoria eliminata con successo'], 200);
        } catch (\Exception $e) {
            return response()->json(['fail' => $e->getMessage()], 500);
        }
    }
}
