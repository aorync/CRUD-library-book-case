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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->string('category');
            $table->year('years_release');
            $table->text('sinopsis');
            $table->string('writer');
            $table->integer('total_page');
            $table->integer('stock_book');
            $table->timestamps();
        });
    }

    // kita membuat folder baru pada resources>views untuk menyimpan bootstrap

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libraries');
    }
};
