<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_status_id')->constrained('expense_statuses');
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('approved_by')->constrained('users');
            $table->text('approver_notes')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->decimal('amount', 20, 2);
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
        Schema::dropIfExists('expenses');
    }
};
