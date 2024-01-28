<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $table = 'stories';
    protected $fillable = ['id', 'by', 'score', 'text', 'time', 'title', 'url', 'category'];
    public $incrementing = false;
    public $timestamps = false;

    public function author() {
      return $this->belongsTo(Author::class, 'by');
    }
    public function kids() {
      return $this->morphMany(Comment::class, 'parent');
    }
}
