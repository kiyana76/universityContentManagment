<?php

namespace App\Models;

use App\Models\Traits\HasJalaliCreatedAt;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalGroup extends Model
{
    use HasFactory, Sluggable, HasJalaliCreatedAt;

    protected $fillable = ['title', 'status'];

    public function getFullNameAttribute() {
        return 'گروه آموزشی ' . $this->title;
    }

    public function isEnable() {
        return $this->status == 'enable';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function fields() {
        return $this->hasMany(GlobalField::class);
    }
}
