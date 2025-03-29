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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id'); // Define 'task_id' as the primary key of the table
            $table->foreignId('registration_id') // Define foreign key column
                ->constrained('registration') // References 'id' column in 'registration' table
                ->onDelete('cascade') // Cascade deletion
                ->onUpdate('cascade'); // Cascade update
            $table->string('task_name')->nullable(false);
            $table->string('task_description')->nullable(false);
            $table->date('deadline')->nullable(false);
            $table->string('status')->nullable(false)->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
