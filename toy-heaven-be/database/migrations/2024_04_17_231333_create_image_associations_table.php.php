<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::create('image_associations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('image_id');
                $table->tinyInteger('type_entity');
                $table->unsignedBigInteger('entity_id');
                $table->timestamps();
    
                // Definizione delle chiavi esterne
                $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');

                $table->foreign('entity_id')->references('id')->on('products')->onDelete('cascade')->name('image_associations_product_id_foreign');
                $table->foreign('entity_id')->references('id')->on('shows')->onDelete('cascade')->name('image_associations_show_id_foreign');
                // Assicurati che le colonne di id_entita facciano riferimento alla corrispondente tabella (prodotti, fiere, contatti)
                // Ad esempio, se id_entita fa riferimento alla tabella prodotti
                // $table->foreign('id_entita')->references('id')->on('prodotti')->onDelete('cascade');
                // Aggiungi altre definizioni di chiavi esterne in base alle tue esigenze
    
                // Aggiungi eventuali vincoli aggiuntivi
                // Esempio di un vincolo che assicura che 'type_entity' possa essere solo 'prodotto', 'fiera' o 'contatto'
                // $table->enum('type_entity', ['prodotto', 'fiera', 'contatto']);
            });
        }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
