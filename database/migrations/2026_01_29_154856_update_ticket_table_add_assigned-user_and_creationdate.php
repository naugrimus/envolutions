<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->integer('assigned_user_id')->nullable()->after('user_id');
            $table->dateTime('creation_date')->useCurrent()->after('created_at');
            $table->dateTime('sla')->nullable()->after('assigned_user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket', function (Blueprint $table) {

            $table->dropColumn('assigned_user_id');
            $table->dropColumn('creation_date');
            $table->dropColumn('sla');
        });
    }
};
