<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug',200)->unique();
            $table->string('shortFormat',200)->unique();
            $table->tinyInteger('subclass_601_T')->nullable()->default(0);
            $table->tinyInteger('subclass_601_B')->nullable()->default(0);
            $table->tinyInteger('subclass_651_T')->nullable()->default(0);
            $table->tinyInteger('subclass_651_B')->nullable()->default(0);
            $table->tinyInteger('publication_status');
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
        Schema::dropIfExists('countries');
    }
}
