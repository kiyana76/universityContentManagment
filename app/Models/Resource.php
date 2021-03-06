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
        'thumbnail_image',
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

    public function question() {
        return $this->hasOne(Question::class);
    }

    public function book() {
        return $this->hasOne(Book::class);
    }

    public function exam() {
        return $this->hasOne(Exam::class);
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

    public function scopeApprove($query) {
        return $query->where('status', 'approve');
    }

    public function getFullNameAttribute() {
        $title = '';
        switch ($this->type){
            case 'Note':
                $title = 'جزوه ' . $this->title;
                break;
            case 'Question':
                $title = 'نمونه سوال ' . $this->title;
                break;
            case 'Book':
                $title = ' کتاب ' . $this->title;
                break;
            case 'Exam':
                $title = $this->title;
                break;
        }
        return $title;
    }

    public function getLinkAddressAttribute() {
        $address = '';
        switch ($this->type){
            case 'Note':
                $address = route('note', [$this->slug]);
                break;
            case 'Question':
                $address = route('question', [$this->slug]);
                break;
            case 'Book':
                $address = route('book', [$this->slug]);
                break;
            case 'Exam':
                $address = route('exam', [$this->slug]);
                break;
        }
        return $address;
    }
}
