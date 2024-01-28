<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
  use HasFactory;
  protected $table = 'poll_options';
  protected $fillable = ['id', 'by', 'poll', 'score', 'text', 'title'];
  public $incrementing = false;
  public $timestamps = false;
  public function author() {
    return $this->belongsTo(Author::class, 'by');
  }
  public function parent() {
    return $this->belongsTo(Poll::class, 'poll');
  }
}
