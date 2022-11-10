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
        Schema::create('log_book', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('brand')->nullable();
            $table->date('borrow_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('initial_name');
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('log_book');
    }
};
