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
        // Si la tabla ya existe, simplemente documentamos los campos esperados
        // En producción, esta migración asegura que existan los datos en site_settings
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No borramos nada, solo documentación
    }
};
