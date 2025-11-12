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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
              $table->string('nama_pasien');
            $table->string('alamat');
            $table->string('no_telpon');
            $table->string('id_rumah_sakit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
