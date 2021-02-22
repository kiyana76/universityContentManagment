<?php

namespace App\Models;

use App\Events\FileDeleted;
use App\Models\Traits\HasJalaliCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;

class File extends Model
{
    use Dispatchable, HasFactory, HasJalaliCreatedAt;
    protected $fillable = ['resource_id', 'file'];
    protected $dispatchesEvents = ['deleting' => FileDeleted::class];

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
