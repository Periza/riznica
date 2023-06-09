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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->integer('sifra')->unique()->length(11);
            $table->string('name');
            $table->string('password');
            $table->string('email');
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->string('confirmation_token')->nullable();
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
