<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationSecondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_seconds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('applicant_id');
            $table->string('full_name',40);
            $table->string('sir_name',20);
            $table->string('first_name',20);
            $table->tinyInteger('change_of_passport');
            $table->string('gender','20');
            $table->string('dob_month','10');
            $table->string('dob_day','10');
            $table->string('dob_year','10');
            $table->string('country_of_birth',50);
            $table->string('nationality',50);
            $table->string('passport_number',50);
            $table->string('passport_issue_country',50);
            $table->string('passport_issue_authority',50);
            $table->string('issue_month','10');
            $table->string('issue_day','10');
            $table->string('issue_year','10');
            $table->string('expiry_month','10');
            $table->string('expiry_day','10');
            $table->string('expiry_year','10');
            $table->string('identity_number',30);
            $table->tinyInteger('another_passport');
            $table->tinyInteger('criminal_conviction');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('applicant_id')
                ->references('id')->on('applications')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_seconds');
    }
}
