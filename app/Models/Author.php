<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $keyType = 'string';
    protected $fillable = ['id', 'created', 'karma', 'about'];
    public $incrementing = false;
    public $timestamps = false;


    public function stories() {
      return $this->hasMany(Story::class, 'by');
    }
    public function comments() {
      return $this->hasMany(Comment::class, 'by');
    }
    public function polls() {
      return $this->hasMany(Poll::class, 'by');
    }
    public function pollOptions() {
      return $this->hasMany(PollOption::class, 'by');
    }
}
