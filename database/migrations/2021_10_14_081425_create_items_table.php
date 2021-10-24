<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->double('price',8,2);
            $table->string('product_type');
            $table->string('tax_type');
            $table->string('tax_percent');
            $table->string('image');
            $table->double('net_price',8,2);
            $table->double('tax_amount',8,2);
            $table->timestamp('created_at')->useCurrent() ;
            $table->timestamp('updated_at')->useCurrent() ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
