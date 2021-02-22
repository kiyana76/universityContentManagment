<?php

namespace App\Models;

use App\Models\Traits\HasJalaliCreatedAt;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory, Sluggable, HasJalaliCreatedAt;

    protected $fillable = ['type',
        'user_id',
        'download_count',
        'rate',
        'title',
        'description',
        'status',
        'approve_by',
        'approve_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function note() {
        return $this->hasOne(Note::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function approveBy() {
        return $this->belongsTo(User::class, 'approve_by');
    }

    public function fields() {
        return $this->belongsToMany(GlobalField::class,'field_resource', 'resource_id', 'field_id');
    }

    public function files() {
        return $this->hasMany(File::class);
    }
}
