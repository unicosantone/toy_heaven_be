<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use app\Models\CategoriesProduct;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getAllPaginateProducts(Request $request)
    {
        
        try {
            $page = $request->query('page', $request->page); 
            $limit = $request->query('limit', $request->limit); 
            $orderBy = $request->query('orderBy', $request->updated_at);
            $order = $request->query('order', $request->order); 
            // Eloquent query to retrieve products with pagination, sorting, and limiting
            $products = Product::orderBy($orderBy, $order)->paginate($limit, ['*'], 'page', $page);
        
            return response()->json($products, 200);
        } catch (Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function getAllAscProducts()
    {
      
        try {
            // Eloquent query to retrieve products with pagination, sorting, and limiting
            $products = Product::orderBy('id', 'ASC')->get();
           

            return response()->json([$products], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getProduct($id)
    {
       
        try {
            
            $product = Product::find($id);

            if (!$product) {
                return response()->json(['fail' => 'Prodotto non trovato'], 404);
            }

            return response()->json([$product], 200);
        } catch (Exception $e) {
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
                'code' => 'required|string',
                'quantity' => 'required|integer',
                'name_ita' => 'required|string',
                'name_eng' => 'required|string',
                'year' => 'required|integer',
                'description_ita' => 'required|string',
                'description_eng' => 'required|string',
                'price' => 'required|numeric',
                'in_evidence' => 'required|boolean',
                'condition_id' => 'required|exists:conditions,id',
                'category_id' => 'required|exists:categories,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['fail' => $validator->errors()], 422);
            }

            $product = Product::create([
                'code' => $request->code,
                'quantity' => $request->quantity,
                'name_ita' => $request->name_ita,
                'name_eng' => $request->name_eng,
                'year' => $request->year,
                'description_ita' => $request->description_ita,
                'description_eng' => $request->description_eng,
                'price' => $request->price,
                'in_evidence' => $request->in_evidence,
                'condition_id' => $request->condition_id,
            ]);

            $categoryProduct = CategoryProduct::create([
                'product_id'=> $product->id,
                'category_id'=>$request->category_id
            ]);
            return response()->json(['success' => 'Prodotto inserito con successo'], 200);
        } catch (Exception $e) {
             return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function editProduct(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'code' => 'string',
                'quantity' => 'integer',
                'name_ita' => 'string',
                'name_eng' => 'string',
                'year' => 'integer',
                'description_ita' => 'string',
                'description_eng' => 'string',
                'price' => 'numeric',
                'in_evidence' => 'boolean',
                'condition_id' => 'exists:conditions,id',
                'sub_category_id' => 'exists:sub_categories,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['fail' => $validator->errors()], 422);
            }

            $product = Product::find($id);

            if (!$product) {
                return response()->json(['fail' => 'Prodotto non trovato'], 404);
            }

            $product->update($request->all());

            return response()->json(['success' => 'Prodotto aggiornato con successo'], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteProduct($id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json(['fail' => 'Prodotto non trovato'], 404);
            }

            $product->delete();

            return response()->json(['success' => 'Prodotto eliminato con successo'], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
