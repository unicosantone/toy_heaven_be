<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function getAllCategories()
    {
        try {
            $categories = Category::all();
            if(empty($categories)){
                return response()->json([
                    'status'=>'empty',
                    'message'=> $categories,
                ],204);
            }
            return response()->json($categories, 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error", 
                "message" => $e->getMessage(),
            ], 500);
        }
    }

    public function getCategory($id)
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    "status" => "error", 
                    'message' => 'Categoria non trovata'], 204);
            }

            return response()->json($category, 200);
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
                'parent_id' => 'nullable|exists:categories,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'=> 'error',
                    'message' => $validator->errors()],
                     422);
            }

            $category = Category::create($request->all());

            return response()->json(['success' => 'Categoria inserita con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()]
                , 500);
        }
    }

    public function editCategory(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'label_ita' => 'string',
                'label_eng' => 'string',
                'image_id' => 'exists:images,id',
                'macro_category_id' => 'exists:macro_categories,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'fail' => $validator->errors()
                ], 422);
            }

            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'status'=> 'error',
                    'message' => 'Categoria non trovata'], 404);
            }

            $category->update($request->all());

            return response()->json(['success' => 'Categoria aggiornata con successo'], 200);
        } catch (\Exception $e) {
            return response()->json(['fail' => $e->getMessage()], 500);
        }
    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'status'=>'error',
                    'message' => 'Categoria non trovata'
                ], 404);
            }

            $category->delete();

            return response()->json(['success' => 'Categoria eliminata con successo'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'=> 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
