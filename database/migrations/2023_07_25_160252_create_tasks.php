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
            $table->id();
            $table->unsignedBigInteger('user_id');

            //Relationship
            $table->foreign('user_id')->references('id')->on('tasks')->restrictOnDelete()->cascadeOnUpdate();

            $table->string('task_name', 150);
            $table->text('description');
            $table->enum('status',['todo', 'in_progress', 'completed']);
            $table->enum('priority',['low', 'medium', 'high']);
            $table->date('due_date');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
