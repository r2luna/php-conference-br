<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function scopeWithLastMessage(Builder $query)
    {
        $query->addSelect([
            'last_message' => Message::query()->select('message')
                ->whereColumn('contact_id', 'contacts.id')
                ->latest()
                ->limit(1),
            'last_time'    => Message::query()->select('created_at')
                ->whereColumn('contact_id', 'contacts.id')
                ->latest()
                ->limit(1),
        ])
            ->withCasts(['last_time' => 'datetime']);
    }
}
