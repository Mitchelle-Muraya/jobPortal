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
    Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->foreignId('job_id')->constrained()->cascadeOnDelete();
        $table->foreignId('worker_id')->constrained('users')->cascadeOnDelete();
        $table->enum('status',['pending','accepted','rejected'])->default('pending');
        $table->text('cover_note')->nullable();
        $table->timestamps();
        $table->unique(['job_id','worker_id']); // one application per worker per job
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
