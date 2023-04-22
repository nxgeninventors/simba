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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('invoice_date');
            $table->string('quotation_number');
            $table->string('reference_number');
            $table->string('reverse_charge');
            $table->string('date_supply');
            $table->string('state');
            $table->string('place_supply');
            $table->string('sub_amount');
            $table->string('sub_gst');
            $table->string('sub_taxable');
            $table->string('totalamount_before');
            $table->string('total_igst');
            $table->string('total_sgst');
            $table->string('total_cgst');
            $table->string('totalamount_after');
            $table->string('client_id');
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
        Schema::dropIfExists('invoices');
    }
};
