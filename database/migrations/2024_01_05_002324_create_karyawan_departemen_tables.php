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
        Schema::create('karyawan_departemen', function (Blueprint $table) {
            $table->string('Kode')->primary();
            $table->string('NIP');
            $table->string('Id_Departemen');
            $table->timestamps('');

            $table->foreign('NIP')->references('NIP')->on('karyawan');
            $table->foreign('Id_Departemen')->references('Id_Departemen')->on('departemen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan_departemen');
    }
};
