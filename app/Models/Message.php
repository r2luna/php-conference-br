<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected static $unguarded = true;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
