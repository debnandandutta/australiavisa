<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',30);
            $table->string('code',10);
            $table->string('symbol',5);
            $table->integer('generalFees');
            $table->integer('standardFees');
            $table->integer('expressFees');
            $table->integer('instantFees');
            $table->enum('status', ['active', 'inactive']);
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
        Schema::dropIfExists('service_fees');
    }
}
