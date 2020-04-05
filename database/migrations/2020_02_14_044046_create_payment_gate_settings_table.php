<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentGateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gate_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paypal_id',30);
            $table->string('senangpay_merchant_id',50);
            $table->string('senangpay_secret_id',50);
            $table->float('service_tax', 8, 2);

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
        Schema::dropIfExists('payment_gate_settings');
    }
}
