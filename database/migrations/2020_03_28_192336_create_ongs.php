<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOngs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongs', function (Blueprint $table) {

            $table->string('id')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('whatsapp')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('uf', 2)->nullable(false);
            $table->timestamps('dt_create');

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ongs');
    }
}
