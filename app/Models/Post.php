<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model

{
    use HasFactory;

    // perintah di terminal untuk membuat model Post beserta migration-nya
    // php artisan make:model Post -m
    // protected $table  = 'nama_tabel'; //digunakan ketika nama tabel tidak default, misal model Post -> posts
    // protected $primaryKey  = 'nama_id'; //digunakan ketika nama primary key tidak default (id), misal post_id

    //menunjukkan bahwa field tersebut boleh diisi secara manual
    protected $fillable = ['slug','title', 'author', 'body'];
}
