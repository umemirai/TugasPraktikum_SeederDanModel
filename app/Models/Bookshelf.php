<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'bookshelf_id');
    }
}
