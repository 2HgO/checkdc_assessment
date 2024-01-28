<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['id', 'by', 'text', 'time', 'parent_type', 'parent_id'];
    public $incrementing = false;
    public $timestamps = false;

    public function author() {
      return $this->belongsTo(Author::class, 'by');
    }
    public function parent() {
      return $this->morphTo('parent');
    }
    public function kids() {
      return $this->morphMany(Comment::class, 'parent');
    }
}
