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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('gender')->nullable(false);
            $table->string('mobile')->nullable(false);
            $table->string('file')->nullable(false)->default('default.jpg');
            $table->string('edu')->nullable(false);
            $table->string('token')->nullable(false);
            $table->string('status')->nullable(false)->default('Inactive');
            $table->string('role')->nullable(false)->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_registration');
    }
};
