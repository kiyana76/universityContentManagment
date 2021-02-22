<?php

namespace App\Models;

use App\Models\Traits\HasJalaliCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory, HasJalaliCreatedAt;
    protected $fillable = ['resource_id', 'file'];

    public function resource() {
        return $this->belongsTo(Resource::class);
    }

    public function getFileNameAttribute() {
        $fileAddress = explode('/', $this->file);
        return end($fileAddress);
    }

    public function getLinkAddressAttribute() {
        return url('storage/' . $this->file);
    }

}
