<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $table = 'polls';
    protected $fillable = ['id', 'by', 'text', 'time', 'title'];
    public $incrementing = false;
    public $timestamps = false;

    public function score() {
      return array_sum(array_map(function ($part) { return $part->score; }, $this->parts));
    }
    public function author() {
      return $this->belongsTo(Author::class, 'by');
    }
    public function parts() {
      return $this->hasMany(PollOption::class, 'poll');
    }
    public function kids() {
      return $this->morphMany(Comment::class, 'parent');
    }
}
