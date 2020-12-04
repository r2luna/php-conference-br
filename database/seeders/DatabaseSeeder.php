<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Message;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Contact::factory()
            ->has(Message::factory()->count(rand(5, 10)))
            ->count(4)
            ->create();
    }
}
