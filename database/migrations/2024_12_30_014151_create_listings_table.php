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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string(column:'title');
            $table->string(column:'logo')->nullable();
            $table->string(column:'tags');
            $table->string(column:'company');
            $table->string(column:'location');
            $table->string(column:'email');
            $table->string(column:'website');
            $table->longText(column:'description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
