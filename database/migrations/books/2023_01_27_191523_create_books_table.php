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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("annotation");
            $table->bigInteger('code');
            $table->string("book_cover");
            $table->integer("user_id")->comment("he/she is owner");
            $table->decimal("price")->nullable();
            $table->integer("count_of_pages")->nullable();
            $table->integer("age_limit")->nullable();
            $table->year("publication")->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('books');
    }
};
