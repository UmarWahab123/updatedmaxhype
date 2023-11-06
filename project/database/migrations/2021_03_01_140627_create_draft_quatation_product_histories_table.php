<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDraftQuatationProductHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_quatation_product_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('column_name')->nullable();
            $table->string('old_value')->nullable();
            $table->string('new_value')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draft_quatation_product_histories');
    }
}
