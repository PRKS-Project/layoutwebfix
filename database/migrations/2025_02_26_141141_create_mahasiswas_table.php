<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('mahasiswa', function (Blueprint $table) {
        $table->string('nim')->primary(); // NIM sebagai Primary Key
        $table->string('nama');
        $table->string('email')->unique();
        $table->string('no_telp');
        $table->string('password'); // Untuk autentikasi
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
