<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'contact_id' => Contact::factory(),
            'message'    => $this->faker->sentence,
            'direction'  => $this->faker->randomElement(['in', 'out']),
        ];
    }
}
