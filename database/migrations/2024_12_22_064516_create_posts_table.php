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
            // Menambahkan kolom foreignId untuk author_id agar berelasi dengan tabel users.
            // - Menggunakan metode `constrained()` untuk secara otomatis menetapkan relasi foreign key dengan tabel users.
            // - Menentukan nama indeks foreign key secara eksplisit dengan parameter `indexName` sebagai 'posts_author_id'.
            // - Metode ini memastikan integritas data antara kolom author_id di tabel posts dan kolom id di tabel users.
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'posts_author_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'posts_category_id'
            );
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
