<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_material', function (Blueprint $table) {
            $table->id();
            $table->string('nama_material');
            $table->string('ukuran')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('satuan');
            $table->date('tanggal');
            $table->string('initial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_material');
    }
};
