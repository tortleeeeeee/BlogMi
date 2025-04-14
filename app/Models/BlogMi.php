<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingPrefix;

class BlogMi extends Model
{
    use HasFactory, Searchable;

    protected $table = 'blogmi';
    protected $fillable = [
        'title',
        'subtitle',
        'status',
        'content'
    ];

    #[SearchUsingPrefix(['title'])]
    public function toSearchableArray() {
        return [
          'title' => $this->title,
          'status' => $this->status,
          'created_at' => $this->created_at
        ];
      }
}
