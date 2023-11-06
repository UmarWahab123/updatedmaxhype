<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVatFunctionalityColsInDraftPurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('draft_purchase_orders', function (Blueprint $table) {
            $table->string('total_with_vat')->after('total')->nullable();
            $table->string('vat_amount_total')->after('total_with_vat')->nullable();
            $table->string('total_vat_actual_price_in_thb')->after('total_vat_actual_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('draft_purchase_orders', function (Blueprint $table) {
            $table->dropColumn('total_with_vat');
            $table->dropColumn('vat_amount_total');
            $table->dropColumn('total_vat_actual_price_in_thb');
        });
    }
}
