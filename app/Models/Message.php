<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Message extends Model
{
    use HasFactory;

    protected static $unguarded = true;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function getImageAttribute()
    {
        if ($image = $this->attributes['image']) {
            return Storage::disk('public')->url($image);
        }

        return null;
    }
}
