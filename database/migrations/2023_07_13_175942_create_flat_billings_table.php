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
        Schema::create('flat_billings', function (Blueprint $table) {
            $table->id();
            $table->string('flat_name');
            $table->integer('flat_bill');
            $table->integer('gass_bill');
            $table->integer('garage_bill');
            $table->integer('maid_bill');
            $table->integer('rubbish_bill');
            $table->double('per_unit_cost');
            $table->integer('previous_month_unit')->default(0);
            $table->integer('current_month_unit')->default(0);
            $table->integer('total_used_unit')->default(0);
            $table->date('date');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flat_billings');
    }
};
