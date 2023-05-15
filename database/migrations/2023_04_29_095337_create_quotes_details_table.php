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
        Schema::create('quotes_details', function (Blueprint $table) {
            $table->id();
            $table->string('s_no');
            $table->string('quotes_no');
            $table->string('service_description');
            $table->string('hsn_code');
            $table->string('periodicity1');
            $table->string('periodicity2');
            $table->string('rate');
            $table->string('amount');
            $table->string('gst');
            $table->string('taxable_value');
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
        Schema::dropIfExists('quotes_details');
    }
};
