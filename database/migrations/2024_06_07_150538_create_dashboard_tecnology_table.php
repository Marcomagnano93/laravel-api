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
        Schema::create('dashboard_tecnology', function (Blueprint $table) {
            $table->unsignedBigInteger('tecnology_id');
            $table->foreign('tecnology_id')->references('id')->on('tecnologies')->onDelete('cascade');

            $table->unsignedBigInteger('dashboard_id');
            $table->foreign('dashboard_id')->references('id')->on('dashboards')->onDelete('cascade');

            $table->primary(['tecnology_id', 'dashboard_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_tecnology');
    }
};
