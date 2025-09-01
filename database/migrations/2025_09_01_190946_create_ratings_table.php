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
    Schema::create('ratings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('job_id')->constrained()->cascadeOnDelete();
        $table->foreignId('client_id')->constrained('users')->cascadeOnDelete(); // rater
        $table->foreignId('worker_id')->constrained('users')->cascadeOnDelete(); // ratee
        $table->unsignedTinyInteger('score'); // 1..5
        $table->text('comment')->nullable();
        $table->timestamps();
        $table->unique(['job_id','client_id','worker_id']); // one rating per job from the client to the worker
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
