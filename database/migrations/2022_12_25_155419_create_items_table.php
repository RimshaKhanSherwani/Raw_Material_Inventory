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
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id', 20);
            $table->string('item_name', 60);
            $table->string('item_desc', 225);
            $table->double('item_quantity');
            $table->string('item_qtype', 60);
            $table->double('item_cost');
            $table->double('Total_cost');
            $table->timestamps();
        });

    }

    // Reverse the migrations.
    // @return void
    public function down()
    {
        Schema::dropIfExists('items');
    }
    public function alter()
    {
        Schema::alter("ALTER TABLE items AUTO_INCREMENT = 0;");
    }
};
