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
        $results = Http::get('https://randomuser.me/api/')->json();
        $faker   = $results['results'][0];

        return [
            'name'  => $faker['name']['first'] . ' ' . $faker['name']['last'],
            'photo' => $faker['picture']['medium'],
        ];
    }
}
