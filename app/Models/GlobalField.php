<?php

namespace App\Models;

use App\Models\Traits\HasJalaliCreatedAt;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalField extends Model
{
    use HasFactory, Sluggable, HasJalaliCreatedAt;

    protected $fillable = ['title', 'status', 'group_id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function isEnable() {
        return $this->status == 'enable';
    }

    public function getFullNameAttribute() {
        return 'رشته تحصیلی ' . $this->title;
    }

    public function group() {
        return $this->belongsTo(GlobalGroup::class);
    }

    public function resources() {
        return $this->belongsToMany(Resource::class, 'field_resource', 'field_id', 'resource_id');
    }
}
