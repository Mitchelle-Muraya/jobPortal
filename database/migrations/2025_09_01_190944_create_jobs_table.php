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
    Schema::create('jobs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('client_id')->constrained('users')->cascadeOnDelete();
        $table->string('title');
        $table->text('description');
        $table->string('location')->nullable();
        $table->decimal('budget',10,2)->nullable();
        $table->enum('status',['pending','approved','open','in_progress','completed','rejected','closed'])
              ->default('pending');
        $table->foreignId('hired_worker_id')->nullable()->constrained('users')->nullOnDelete();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
