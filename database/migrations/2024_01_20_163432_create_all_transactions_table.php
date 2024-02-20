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
        Schema::create('all_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('all_users');
            $table->enum('movement_type', ['income', 'expense']);
            $table->string('description');
            $table->date('date');
            $table->decimal('amount', 10, 2);
            $table->enum('completed', ['yes', 'no']);
            $table->enum('category_income', ['salary', 'interest', 'investment', 'rent'])->nullable();
            $table->enum('category_expense', ['leisure', 'restaurant', 'transport', 'health', 'clothing', 'others'])->nullable();
            $table->enum('payment_method_income', ['cash', 'transfer', 'check', 'bizum'])->nullable();
            $table->enum('payment_method_expense', ['cash', 'transfer', 'check', 'bizum', 'card'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_transactions');
    }
};
