<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'category',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
