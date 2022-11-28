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
        Schema::create('list_sparepart', function (Blueprint $table) {
            $table->id();
            $table->string('sparepart_code')->nullable();
            $table->string('sparepart_name');
            $table->string('brand')->nullable();
            $table->string('specification')->nullable();
            $table->string('equipment_number')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('list_sparepart');
    }
};
