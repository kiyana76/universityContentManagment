<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteFileFromLocalStorage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $file = $event->file;

        if(\Illuminate\Support\Facades\File::exists('storage/' . $file->file)) {
            \Illuminate\Support\Facades\File::delete('storage/' . $file->file);
        }
    }
}
