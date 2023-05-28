<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricelogs', function (Blueprint $table) {
            $table->id('pricelog_id', 20);
            $table->string('item_name', 225);
            $table->double('previous_price', 225);
            $table->double('updated_price',225);
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
        Schema::dropIfExists('pricelogs');
    }
};
