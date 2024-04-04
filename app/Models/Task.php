<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $table = 'tasks';
    protected $fillable = ['user_id', 'title', 'description'];

    public function isCompleted()
    {
        return $this->completed;
    }

    public function reopen()
    {
        $this->completed = false;
        $this->save();
    }
}
