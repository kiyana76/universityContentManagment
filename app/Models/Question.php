<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['resource_id', 'teacher_name', 'year', 'term'];

    public function getFullNameAttribute() {
        return 'نمونه سوال ' . $this->resource->title;
    }

    public function resource() {
        return $this->belongsTo(Resource::class, 'resource_id', 'id');
    }
}