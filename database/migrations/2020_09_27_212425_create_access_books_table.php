<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_books', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id')->nullable(); // Профиль пользователя, у которого можно читать книги
            $table->integer('user_id'); // пользователь, которому выдаётся доступ
            $table->integer('book_id')->nullable(); // книга, которую можно читать
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
        Schema::dropIfExists('access_books');
    }
}
