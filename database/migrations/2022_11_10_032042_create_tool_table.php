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
        Schema::create('tool', function (Blueprint $table) {
            $table->id();
            $table->string('tool_code')->nullable();
            $table->string('nama');
            $table->string('brand')->nullable();
            $table->string('jumlah')->nullable();
            $table->text('lemari')->nullable();
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
        Schema::dropIfExists('tool');
    }
};
