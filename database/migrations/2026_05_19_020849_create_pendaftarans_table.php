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
        Schema::create('pendaftarans', function (Blueprint $table) {

            $table->id();

            $table->string('nama_lengkap');
            $table->string('nis');
            $table->string('kelas');
            $table->string('no_hp');

            $table->string('sekbid');

            $table->text('alasan');

            $table->enum('status', [
                'pending',
                'lolos',
                'gagal'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};