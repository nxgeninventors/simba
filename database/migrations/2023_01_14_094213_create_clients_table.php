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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('website', 255);
            $table->string('industry', 255);
            $table->text('description');
            $table->foreignId('country_id')->constrained('countries');
            $table->string('email', 100)->unique();
            $table->string('mobile', 25);
            $table->text('street_address');
            $table->string('city', 150);
            $table->string('state', 150);
            $table->string('zip', 15);
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
        Schema::dropIfExists('clients');
    }
};
