<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // 1. Nama
    // 2. Jenis Kelamin
    // 3. Tanggal Lahir
    // 4. Pekerjaan
    // 5. Provinsi
    // 6. Kab/Kota
    // 7. Kecamatan
    // 8. Desa
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("gender");
            $table->text("birth_date");
            $table->text("occupation");
            $table->text("province");
            $table->text("city");
            $table->text("subdistrict");
            $table->text("village");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
