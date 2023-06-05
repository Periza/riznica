<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('oib');
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->boolean('visible_to_all')->default(true);

            // Foreign key constraint to associate with the partners table
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
