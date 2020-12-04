<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'name'  => $this->faker->name,
            'photo' => 'http://i.pravatar.cc/128?img=' . collect(range(1, 70))->random(),
        ];
    }
}
