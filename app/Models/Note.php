<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Resource
{
    use HasFactory;
    protected $fillable = ['resource_id', 'teacher_name', 'year', 'term'];

    public function getFullNameAttribute() {
        return 'جزوه ' . $this->resource->title;
    }

    public function resource() {
        return $this->belongsTo(Resource::class, 'resource_id', 'id');
    }

    public function getLinkAddressAttribute() {
        return route('note', [$this->resource->slug]);
    }
}
