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

        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('account_id')->constrained();
            $table->string('name', 50);
            $table->string('company', 50)->nullable();
            $table->enum('priority', ["low","medium","high","important"])->nullable();
            $table->enum('urgency', ["slow","medium","fast","urgent"])->nullable();
            $table->date('submission_date')->nullable();
            $table->enum('status', ["waiting","received","pending","submitted","accepted"])->nullable();
            $table->integer('income')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
