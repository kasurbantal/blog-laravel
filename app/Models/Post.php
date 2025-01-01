<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model

{
    use HasFactory;

    // perintah di terminal untuk membuat model Post beserta migration-nya
    // php artisan make:model Post -m
    // protected $table  = 'nama_tabel'; //digunakan ketika nama tabel tidak default, misal model Post -> posts
    // protected $primaryKey  = 'nama_id'; //digunakan ketika nama primary key tidak default (id), misal post_id

    //menunjukkan bahwa field tersebut boleh diisi secara manual
    protected $fillable = ['slug','title', 'author', 'body'];

    //default untuk melakukan eager loading. untuk kasus ini melakukan eager loading untuk setiap pemanggilan relasi author dan category
    //eager loading digunakan untuk menyelesaikan masalah loading pada query
    protected $with = ['author', 'category'];

    // Menambahkan relasi belongsTo ke User untuk menghubungkan Post dengan User sebagai author.
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
