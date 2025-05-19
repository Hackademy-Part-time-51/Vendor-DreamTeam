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
        Schema::table('images', function (Blueprint $table) {
            $table->string('labels')->nullable();
            $table->string('spoof')->nullable();
            $table->string('medical')->nullable();
            $table->string('adult')->nullable();
            $table->string('violence')->nullable();
            $table->string('racy')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('labels');
            $table->dropColumn('spoof');
            $table->dropColumn('medical');
            $table->dropColumn('adult');
            $table->dropColumn('violence');
            $table->dropColumn('racy');
        });
    }
};
