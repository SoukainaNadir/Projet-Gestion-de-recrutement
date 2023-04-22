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
        Schema::table('cvs', function (Blueprint $table) {
            //
            $table->string('headline')->nullable();
            $table->string('profil')->nullable();
            $table->string('image')->nullable();
            $table->string('languages')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cvs', function (Blueprint $table) {
            //
            $table->dropColumn('headline');
            $table->dropColumn('profil');
            $table->dropColumn('image');
            $table->dropColumn('languages');
        });
    }
};
