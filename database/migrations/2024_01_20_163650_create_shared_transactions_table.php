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
        Schema::create('shared_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaction_id');
            $table->decimal('amount', 10, 2);
            $table->unsignedBigInteger('who_paid');
            $table->foreign('who_paid')->references('id')->on('all_users');
            $table->unsignedInteger('number_of_participants');
            $table->string('name_of_participants');
            $table->decimal('amount_per_participant', 10, 2);
            $table->date('date');
            $table->string('description');
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('note');
            $table->foreign('user_id')->references('id')->on('all_users')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('all_transactions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shared_transactions');
    }
};
