<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerdeseksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerdeseks', function (Blueprint $table) {
            $table->increments('kerdes_id');
            $table->integer('kerdoiv_id')->unsigned();
            $table->string('kerdes_szovege');
            $table->foreign('kerdoiv_id')->references('kerdoiv_id')->on('kerdoivs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kerdeseks');
    }
}
