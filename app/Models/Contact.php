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

    public function lastMessage()
    {
        return $this->belongsTo(Message::class, 'last_message_id');
    }

    public function scopeWithLastMessage(Builder $query)
    {
        $query->addSelect([
            'last_message_id' => Message::query()->select('id')
                ->whereColumn('contact_id', 'contacts.id')
                ->latest()
                ->limit(1),
        ])->with('lastMessage');
    }
}
