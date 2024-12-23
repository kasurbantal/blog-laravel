<?php
namespace App\Models;

use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post extends Model
{
    // protected $table  = 'nama_tabel'; //digunakan ketika nama tabel tidak default, misal model Post -> posts
    // protected $primaryKey  = 'nama_id'; //digunakan ketika nama primary key tidak default (id), misal post_id

    //menunjukkan bahwa field tersebut boleh diisi secara manual
    protected $fillable = ['slug','title', 'author', 'body'];
}

