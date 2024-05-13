<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'path' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['fail' => $validator->errors()], 422);
        }

        $image = Image::create([
            'path' => $request->path,
        ]);

        if (!$image) {
            return response()->json([
                'status'=>'error',
                'message' => 'Errore nella creazione dell\'immagine'
            ], 422);
        }

        return response()->json(['success' => 'Immagine inserita con successo'], 200);
    }

    public function getAllImages()
    {
        $images = Image::all();
        return response()->json($images, 200);
    }

    public function getImage($id)
    {
        $image = Image::find($id);
        if (!$image) {
            return response()->json([
                'status'=>'error',
                'message' => 'Immagine non trovata'], 404);
        }
        return response()->json([$image], 200);
    }

    public function editImage(Request $request, $id)
    {
        $image = Image::find($id);
        if (!$image) {
            return response()->json([
            'status'=>'error',
            'fail' => 'Immagine non trovata'], 404);
        }

        $validator = Validator::make($request->all(), [
            'path' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['fail' => $validator->errors()], 422);
        }

        $image->update([
            'path' => $request->path,
        ]);

        return response()->json(['success' => 'Immagine aggiornata con successo'], 200);
    }

    public function deleteImage($id)
    {
        $image = Image::find($id);
        if (!$image) {
            return response()->json([
                'status'=>'error',
                'message' => 'Immagine non trovata'
            ], 404);
        }

        $image->delete();
        return response()->json(['success' => 'Immagine eliminata con successo'], 200);
    }
}
