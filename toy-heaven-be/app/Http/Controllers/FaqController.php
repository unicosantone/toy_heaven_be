<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Exception;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    // //  'question_ita',
    // 'question_eng',
    // 'answer_ita',
    // 'answer_eng'
    public function create(Request $request)
    {
        try {
            // Validazione dei campi
            $rules = [
                'question_ita' => 'required|string',
                'question_eng' => 'required|string',
                'answer_ita' => 'required|string',
                'answer_eng' => 'required|string',
            ];

            // Definisci i messaggi di errore personalizzati
            $messages = [
                'required' => 'Il campo :attribute è obbligatorio.',
                'string' => 'Il campo :attribute deve essere una stringa.',
            ];

            // Esegui la validazione
            $validator = Validator::make($request->all(), $rules, $messages);

            // Se la validazione fallisce, restituisci gli errori
            if ($validator->fails()) {
                return response()->json(['fail' => $validator->errors()], 422);
            }

            // Creazione della FAQ
            $faqData = $request->only(['question_ita', 'question_eng', 'answer_ita', 'answer_eng'
            ]);
            $faq = Faq::create($faqData);

            if (!$faq) {
                return response()->json(['fail' => 'Errore nella creazione della FAQ'], 422);
            }

            return response()->json(['success' => 'FAQ inserita con successo'], 200);
        } catch (Exception $e) {
            return response()->json(['fail' => $e->getMessage()], 500);
        }
    }


    public function getFaq($id){
        try{
            // Trova la FAQ per ID
            $faq = Faq::find($id);
    
            // Se la FAQ non esiste, restituisci un messaggio di errore
            if(!$faq){
                return response()->json([
                    'status'=> 'error',
                    'message' => 'FAQ non trovata'
                ], 404);
            }
    
            // Se la FAQ esiste, restituiscila
            return response()->json($faq, 200);
        }catch(Exception $e){
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getAllFaqs(){
        try {
            // Ottieni tutte le FAQ dal database
            $faqs = Faq::get();
            if(!$faqs){
                return response()->json([
                    'status'=>'empty',
                    'message'=> $faqs
                ], 204);
            }
            // Restituisci le FAQ ottenute come risposta JSON
            return response()->json($faqs, 200);
        } catch (Exception $e) {
            // Se si verifica un'eccezione, restituisci un messaggio di errore con codice di stato 500
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function editFaq(Request $request, $id)
    {
        try {
            // Trova la FAQ per ID
            $faq = Faq::find($id);

            // Se la FAQ non esiste, restituisci un messaggio di errore
            if (!$faq) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'FAQ non trovata'
                ], 404);
            }
 
            \Log::info('Dati ricevuti request: ', $request->all());


            // Validazione dei campi
            $rules = [
                'question_ita' => 'required|string',
                'question_eng' => 'required|string',
                'answer_ita' => 'required|string',
                'answer_eng' => 'required|string',
            ];

            $messages = [
                'required' => 'Il campo :attribute è obbligatorio.',
                'string' => 'Il campo :attribute deve essere una stringa.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            // Se la validazione fallisce, restituisci gli errori
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validazione fallita.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Aggiorna i campi della FAQ con i nuovi valori
            $faq->update($request->only(['question_ita', 'question_eng', 'answer_ita', 'answer_eng']));

            // Restituisci la FAQ aggiornata come risposta JSON
            return response()->json([
                'status' => 'success',
                'message' => 'FAQ aggiornata con successo',
                'data' => $faq
            ], 200);
        } catch (Exception $e) {
            // Se si verifica un'eccezione, restituisci un messaggio di errore con codice di stato 500
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    public function deleteFaq($id)
    {
        \Log::info('Dati ricevuti request: ', ['id' => $id]);

        try {
            // Trova la FAQ per ID
            $faq = Faq::find($id);

            // Se la FAQ non esiste, restituisci un messaggio di errore
            if (!$faq) {
                return response()->json([
                    'status'=>'error',
                    'message' => 'FAQ non trovata'
                ], 404);
            }

            // Elimina la FAQ
            $faq->delete();

            // Restituisci un messaggio di successo
            return response()->json(['success' => 'FAQ eliminata con successo'], 200);
        } catch (Exception $e) {
            // Se si verifica un'eccezione, restituisci un messaggio di errore con codice di stato 500
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getAllPaginateFaq(Request $request)
    {
         
        try {
            $page = $request->query('page', $request->page); 
            $limit = $request->query('limit', $request->limit); 
            $orderBy = $request->query('orderBy', $request->updated_at);
            $order = $request->query('order', $request->order); 
            $faqs = Faq::orderBy($orderBy, $order)->paginate($limit, ['*'], 'page', $page);
        
            return response()->json($faqs, 200);
        } catch (Exception $e) {
            return response()->json([
                'status'=>'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
