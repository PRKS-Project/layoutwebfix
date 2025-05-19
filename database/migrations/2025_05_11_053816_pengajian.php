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
        Schema::create('pengajian', function (Blueprint $table) {
            $table->increments('id')->primary(); // NIM sebagai Primary Key
            $table->date('tanggal');
            $table->integer('id_anggota');
            $table->string('tempat');
            $table->decimal('jumlah');
            $table->decimal('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajian');
    }
};
