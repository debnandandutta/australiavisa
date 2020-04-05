<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name','30');
            $table->text('about',200);
            $table->string('logo','20');
            $table->string('address','20');
            $table->string('phone','20');
            $table->string('email','20');
            $table->string('fax','20');
            $table->string('facebook','20');
            $table->string('tweeter','20');
            $table->string('googleplus','20');
            $table->string('linkdin','20');
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
        Schema::dropIfExists('basic_information');
    }
}
