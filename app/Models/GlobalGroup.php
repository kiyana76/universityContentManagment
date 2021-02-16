<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalGroup extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status'];

    public function getFullName() {
        return 'گروه آموزشی ' . $this->title;
    }

    public function isEnable() {
        return $this->status == 'enable';
    }
}
