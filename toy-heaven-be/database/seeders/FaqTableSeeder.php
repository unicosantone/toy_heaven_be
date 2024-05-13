<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqData = [
            [
                "question_ita" => "Come effettuare un ordine?",
                "question_eng" => "How to place an order?",
                "answer_ita" => "Per fare un ordine aggiungi gli articoli che ti interessano nel carrello. Quando vuoi concludere l’ordine vai al carrello cliccando sull’iconcina a forma di carrello in alto a destra e poi clicca sul pulsante 'Concludi Ordine', oppure clicca su 'Checkout'.<br/> Inserisci i tuoi dati, scegli la spedizione che preferisci e la modalità di pagamento che desideri utilizzare e clicca sul pulsante 'Effettua Ordine'. Sarai quindi reindirizzato alla pagina di riepilogo e riceverai automaticamente una email con la ricevuta del tuo ordine.<br/> Provvederemo noi a contattarti via email per confermarti la disponibilità degli articoli e i dettagli per il pagamento e la spedizione.",
                "answer_eng" => "To place an order, add the items you are interested in to your cart. When you are ready to finalize the order, go to the cart by clicking on the cart icon at the top right and then click on the 'Complete Order' button, or click on 'Checkout'.<br/> Enter your details, choose the shipping method you prefer and the payment method you wish to use, and click on the 'Place Order' button. You will then be redirected to the summary page and will automatically receive an email with the receipt of your order.<br/>  We will contact you by email to confirm the availability of the items and the details for payment and shipping.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "question_ita" => "Quali modalità di pagamento accettate?",
                "question_eng" => "What payment methods do you accept?",
                "answer_ita" => "Accettiamo le seguenti forme di pagamento: <br/>  🔹 ricarica carta Postepay,<br/> 🔹  bonifico su c/c bancario, <br/> 🔹 ricarica PayPal. <br/>  Il bonifico bancario è l’unico che non viene ricevuto in tempo reale. Affinché l’ordine venga spedito è necessario attendere l’accredito sul mio conto corrente.",
                "answer_eng" => "We accept the following payment methods: Postepay card recharge, bank transfer, PayPal recharge. Bank transfer is the only method that is not received in real-time. In order for the order to be shipped, it is necessary to wait for the credit to appear on my bank account.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "question_ita" => "Comprate o scambiate giocattoli?",
                "question_eng" => "Do you buy or exchange toys?",
                "answer_ita" => "Acquistiamo articoli o intere collezioni; inviateci una lista di quello che volete proporci, indicandoci qual è la vostra richiesta. <br/> Ricordatevi che non prenderemo in considerazione proposte di vendita prive di prezzo o richieste di valutazioni.",
                "answer_eng" => "We buy items or entire collections; please send us a list of what you would like to propose, specifying your request. <br/> Remember that we will not consider sales proposals without a price or requests for valuations.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "question_ita" => "È possibile aggiungere articoli dopo aver effettuato un ordine?",
                "question_eng" => "Is it possible to add items after placing an order?",
                "answer_ita" => "Se gli oggetti non sono stati spediti è sempre possibile aggiungere nuovi articoli all’ordine. È possibile farlo sul sito o tramite mail diretta.",
                "answer_eng" => "If the items have not been shipped, it is always possible to add new items to the order. This can be done on the website or by direct email.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "question_ita" => "Dopo quanto tempo l’ordine viene spedito?",
                "question_eng" => "How long after placing an order is it shipped?",
                "answer_ita" => "I pacchi vengono spediti dal lunedì al venerdì, generalmente uno o due giorni dopo la ricezione del pagamento. Se ci sono urgenze particolari (compleanni, regali o quant’altro) comunicatecelo nelle note durante la compilazione dell’ordine.",
                "answer_eng" => "Packages are shipped from Monday to Friday, generally one or two days after payment is received. If there are special urgencies (birthdays, gifts, etc.), please let us know in the notes during the order process.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "question_ita" => "Gli articoli che vedo in foto sono esattamente quelli che verranno spediti?",
                "question_eng" => "Are the items I see in the photos exactly those that will be shipped?",
                "answer_ita" => "Ci sono due tipologie di oggetti, quelli con quantitativo pari ad uno e quelli disponibili in maggior numero.<br/> Per quanto riguarda i primi, non c’è dubbio che l’oggetto che riceverete sarà esattamente quello che vedete nel sito. <br/>Per gli altri, invece, vi verrà inviato uno degli articoli dell’assortimento.",
                "answer_eng" => "There are two types of items, those with a quantity of one and those available in greater numbers.<br/> For the former, there is no doubt that the item you receive will be exactly what you see on the site. <br/>For the latter, one of the items from the assortment will be sent to you.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "question_ita" => "È possibile richiedere uno sconto?",
                "question_eng" => "Is it possible to request a discount?",
                "answer_ita" => "I prezzi sono generalmente fissi, ciò non toglie che per alcuni articoli o ordini cospiqui non si possa fare un piccolo sconto",
                "answer_eng" => "Prices are generally fixed, however, a small discount may be made for some items or substantial orders",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        DB::table('faqs')->insert($faqData);
    }
}
