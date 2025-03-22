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
        Schema::create('customer_profiles', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('cust_id')->index();
            $table->string('profile_picture', 255)->nullable();
            $table->text('bio')->nullable();
            $table->string('phone', 15)->unique()->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('dob')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('website', 2083)->nullable();
            $table->string('linkedin', 2083)->nullable();
            $table->string('twitter', 2083)->nullable();
            $table->string('language', 50)->nullable();
            $table->string('timezone', 100)->nullable();
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
            $table->boolean('verified')->default(false);
            $table->timestamps();


            $table->foreign('cust_id')->references('id')->on('customers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_profiles', function (Blueprint $table) {
            //
        });
    }
};
