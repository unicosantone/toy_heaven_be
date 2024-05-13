<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'label_ita' => 'required|string',
            'label_eng' => 'required|string',
            'value' => 'required|string',
            'link' => 'required|string',
            'image_id' => 'required|exists:images,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'message' => $validator->errors()
            ], 422);
        }

        $contact = Contact::create([
            'label_ita' => $request->label_ita,
            'label_eng' => $request->label_eng,
            'value' => $request->value,
            'link' => $request->link,
            'image_id' => $request->image_id,
        ]);

        if (!$contact) {
            return response()->json([
                'status'=>'error',
                'message' => 'Errore nella creazione del contatto'
            ], 422);
        }

        return response()->json(['success' => 'Contatto inserito con successo'], 200);
    }

    public function getAllContacts()
    {
        $contacts = Contact::all();
        return response()->json($contacts, 200);
    }

    public function getContact($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json([
                'status'=>'error',
                'message' => 'Contatto non trovato'
            ], 404);
        }
        return response()->json($contact, 200);
    }
    public function getImage($id)
    {

        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json([
                'status'=>'error',
                'message' => 'Contatto non trovato'
            ], 404);
        }
        $image = $contact->image()->first();
        if (!$image) {
            return response()->json([
                'status'=>'error',
                'message' => 'Immagine non trovata per contatto'
            ], 404);
        }
        $contact->image = $image;
        
        return response()->json($contact, 200);
    }

    public function editContact(Request $request, $id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json([
                'status'=>'error',
                'message' => 'Contatto non trovato'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'label_ita' => 'required|string',
            'label_eng' => 'required|string',
            'value' => 'required|string',
            'link' => 'required|string',
            'image_id' => 'required|exists:images,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'message' => $validator->errors()
            ], 422);
        }

        $contact->update([
            'label_ita' => $request->label_ita,
            'label_eng' => $request->label_eng,
            'value' => $request->value,
            'link' => $request->link,
            'image_id' => $request->image_id,
        ]);

        return response()->json(['success' => 'Contatto aggiornato con successo'], 200);
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json([
                'status'=> 'error',
                'message' => 'Contatto non trovato'
            ], 404);
        }

        $contact->delete();
        return response()->json(['success' => 'Contatto eliminato con successo'], 200);
    }
}
