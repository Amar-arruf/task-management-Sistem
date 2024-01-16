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
            $table->id('id_tugas');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_kategori');
            $table->string('judul_tugas', 100);
            $table->string('pemberi_tugas', 100);
            $table->longText('deskripsi');
            $table->unsignedBigInteger('id_todo');
            $table->enum('status', ["not started", "progress", "completed"]);
            $table->smallInteger('progress');
            $table->date('date');
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
