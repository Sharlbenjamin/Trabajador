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
        Schema::disableForeignKeyConstraints();

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name', 50);
            $table->string('link')->nullable();
            $table->string('category', 100)->nullable();
            $table->string('topic', 100)->nullable();
            $table->string('subject', 100)->nullable();
            $table->enum('level', ["easy","medium","hard","difficult"]);
            $table->enum('status', ["Preparing","Learning","Finished"]);
            $table->integer('chapters')->nullable();
            $table->integer('length')->nullable();
            $table->integer('progress')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
