<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_number');
            $table->string('group_id',20);
            $table->string('personal_id',20);
            $table->string('email','40');
            $table->string('phone','20');
            $table->text('address',200);
            $table->string('visa_type','200');
            $table->string('visa_file','20');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('applications');
    }
}
