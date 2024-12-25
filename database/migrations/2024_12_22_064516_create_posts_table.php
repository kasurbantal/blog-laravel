<!-- perintah di terminal:
php artisan make:migration create_posts_table -->

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('author_id'); //membuat author id yang berelasi dengan tabel users, string diubah menjadi unsignedBigInteger karena id yang ada di tabel user menggunakan big integer
            $table->foreign('author_id')->references('id')->on('users'); //author_id berelasi dengan id yang ada di tabel users
            $table->string('slug')->unique();
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
