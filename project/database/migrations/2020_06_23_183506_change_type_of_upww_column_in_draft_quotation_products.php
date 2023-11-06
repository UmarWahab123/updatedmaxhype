<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeOfUpwwColumnInDraftQuotationProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('draft_quotation_products', function (Blueprint $table) {
            $table->decimal('unit_price_with_vat',15,6)->nullabe()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('draft_quotation_products', function (Blueprint $table) {
            $table->string('unit_price_with_vat')->nullable()->change();
        });
    }
}
