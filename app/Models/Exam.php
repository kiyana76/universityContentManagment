<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Resource
{
    use HasFactory;
    protected $fillable = ['resource_id', 'year'];

    public function getFullNameAttribute() {
        return $this->resource->title;
    }

    public function resource() {
        return $this->belongsTo(Resource::class, 'resource_id', 'id');
    }

    public function getLinkAddressAttribute() {
        return route('exam', [$this->resource->slug]);
    }
}
