<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogMi extends Model
{
    use HasFactory;

    protected $table = 'blogmi';
    protected $fillable = [
        'title',
        'subtitle',
        'status',
        'content'
    ];
}
