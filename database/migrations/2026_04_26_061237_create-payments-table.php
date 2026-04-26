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
     
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('appointment_id');
        $table->decimal('amount', 10, 2);
        $table->string('status')->default('Unpaid'); // Paid / Unpaid
        $table->timestamp('payment_date')->nullable();
        $table->timestamps();

        $table->foreign("appointment_id")
                ->references("id")
                ->on("appointments")
                ->onDelete("cascade");
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
