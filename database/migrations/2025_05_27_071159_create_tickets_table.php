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
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('title');
        $table->text('description')->nullable();
        $table->date('assign_at');

        $table->foreignId('ticket_type_id')->constrained();
        $table->foreignId('project_id')->constrained();

        $table->enum('status', ['open', 'progress', 'closed', 'cancel'])->default('open');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
