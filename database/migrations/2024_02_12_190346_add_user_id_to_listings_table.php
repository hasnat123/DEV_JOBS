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
        Schema::table('listings', function (Blueprint $table) {

            /* 'Foreign key' column used to establish relationship between listings table and parent (users) table'.
            'Constraint' used to ensure that the foreign key column references the 'id' column of users table.
            'onDelete' method specifies that if user is deleted, their listingsare deleted as well */
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            //
        });
    }
};
