<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    
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
