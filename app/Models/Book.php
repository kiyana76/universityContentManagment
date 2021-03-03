<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Resource
{
    use HasFactory;
    protected $fillable = ['resource_id', 'writer', 'publisher', 'edit'];

    public function getFullNameAttribute() {
        return 'کتاب ' . $this->resource->title;
    }

    public function resource() {
        return $this->belongsTo(Resource::class, 'resource_id', 'id');
    }

    public function getLinkAddressAttribute() {
        return route('book', [$this->resource->slug]);
    }
}
