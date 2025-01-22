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
        Schema::create('childrens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('users')->onDelete('cascade');
            $table->string('name', 100);
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('vaccination_status', ['Pending', 'Completed'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('childrens');
    }
};
