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
        Schema::create('rent_bills', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->decimal('balance');
            $table->string('previous_bill');
            $table->string('unpaid_bill');
            $table->string('overdue_bill');
            $table->string('payed_bill');
            $table->string('total_bill');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_bills');
    }
};
