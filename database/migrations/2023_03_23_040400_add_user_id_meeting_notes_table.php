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
        Schema::table('meeting_notes', function (Blueprint $table) {
            $table->foreignId('user_id')->after('meeting_notes')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meeting_notes', function (Blueprint $table) {
            $table->dropForeign('meeting_notes_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
