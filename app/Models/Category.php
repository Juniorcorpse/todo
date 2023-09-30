<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'color',
        'user_id'
    ];
    
    /**
     * Method user
     * uma Category pertece a um User
     * @
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Method tasks
     * Uma Category pode ter varias Tasks
     * @
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
