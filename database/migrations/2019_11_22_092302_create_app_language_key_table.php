<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppLanguageKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_language_key', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('app_language_id');
            $table->text('key');
            $table->text('value')->nullable();
            $table->text('audio')->nullable();
            $table->unique(['app_language_id', 'key']);
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
        Schema::dropIfExists('app_language_key');
    }
}
