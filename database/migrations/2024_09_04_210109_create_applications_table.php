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

        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('account_id')->constrained();
            $table->string('company', 50);
            $table->date('date')->nullable();
            $table->string('job_title', 50)->nullable();
            $table->enum('status', ["applied","interview","accepted","rejected"])->nullable();
            $table->date('expected_reply_date')->nullable();
            $table->enum('priority', ["low","medium","high","important"])->nullable();
            $table->integer('salary')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
