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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cust_id');
            $table->unsignedBigInteger('client_id');
            $table->bigInteger('invoice_number')->unique();
            $table->unsignedBigInteger('service_id');
            $table->bigInteger('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->dateTime('issue_date');
            $table->dateTime('due_date');
            $table->decimal('amount', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->unsignedBigInteger('payment_method');
            $table->string('notes', 255)->nullable();
            $table->timestamps();

            $table->foreign('cust_id')->references('id')->on('customers')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('client_id')->references('id')->on('clients')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('service_id')->references('id')->on('services')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('payment_method')->references('id')->on('payment_methods')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices_tables');
    }
};
