<?php

namespace App\Models\Traits;

trait HasJalaliCreatedAt
{
    public function getJalaliCreatedAtAttribute()
    {
        $createdAt = $this->created_at;
        $format    = count(explode(' ', $createdAt)) > 1 ? 'Y/m/d H:i:s' : 'Y/m/d';

        return jdate($createdAt)->format($format);
    }


    public function getJalaliCreatedAtDateAttribute()
    {
        return jdate($this->created_at)->format('Y/m/d');
    }


    public function getJalaliCreatedAtAgoAttribute()
    {
        return jdate($this->created_at)->ago();
    }
}