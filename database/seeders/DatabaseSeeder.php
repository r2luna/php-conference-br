<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->chat1();
        $this->chat2();
    }

    private function chat1()
    {
        /** @var Contact $amanda */
        $amanda = Contact::factory()->create([
            'name'  => 'Amanda Santos',
            'photo' => 'https://randomuser.me/api/portraits/women/56.jpg',
        ]);

        $amanda->messages()
            ->createMany([
                [
                    'message'    => 'Fala Jetete, o que vc vai fazer amanhã de manhã? Vamos correr no parque?',
                    'direction'  => 'in',
                    'send_at'    => carbon()->setDate(2020, 12, 3),
                    'created_at' => carbon()->setDate(2020, 12, 3)->setTime(11, 20),
                ],
                [
                    'message'    => 'Kkkkk eu tô precisando é do exercício mesmo. Que horas?',
                    'direction'  => 'out',
                    'send_at'    => carbon()->setDate(2020, 12, 3),
                    'created_at' => carbon()->setDate(2020, 12, 3)->setTime(11, 25),
                ],
                [
                    'message'    => 'Vamos as 8? Pq parece que vai chover de tarde.',
                    'direction'  => 'in',
                    'send_at'    => carbon()->setDate(2020, 12, 3),
                    'created_at' => carbon()->setDate(2020, 12, 3)->setTime(11, 26),
                ],
                [
                    'message'    => 'Oito??? 😵',
                    'direction'  => 'out',
                    'send_at'    => carbon()->setDate(2020, 12, 3),
                    'created_at' => carbon()->setDate(2020, 12, 3)->setTime(11, 27),
                ],
                [
                    'message'    => '8:15 vai.. amanhã é sabado.',
                    'direction'  => 'out',
                    'send_at'    => carbon()->setDate(2020, 12, 3),
                    'created_at' => carbon()->setDate(2020, 12, 3)->setTime(11, 27),
                ],
                [
                    'message'    => 'Kkkkkk',
                    'direction'  => 'in',
                    'send_at'    => carbon()->setDate(2020, 12, 3),
                    'created_at' => carbon()->setDate(2020, 12, 3)->setTime(11, 28),
                ],
            ]);
    }

    private function chat2()
    {
        /** @var Contact $marcos */
        $marcos = Contact::factory()->create([
            'name'  => 'Marcos Silva',
            'photo' => 'https://randomuser.me/api/portraits/men/55.jpg',
        ]);

        $marcos->messages()
            ->createMany([
                [
                    'message'    => 'Fala cara, blz?',
                    'direction'  => 'out',
                    'send_at'    => carbon()->setDate(2020, 12, 2),
                    'created_at' => carbon()->setDate(2020, 12, 2)->setTime(13, 20),
                ],
                [
                    'message'    => 'Tava pensando em ir assistir um filme esse fds. Bora?',
                    'direction'  => 'out',
                    'send_at'    => carbon()->setDate(2020, 12, 2),
                    'created_at' => carbon()->setDate(2020, 12, 2)->setTime(13, 21),
                ],
                [
                    'message'    => 'Qual filme vc ta pensando?',
                    'direction'  => 'in',
                    'send_at'    => carbon()->setDate(2020, 12, 3),
                    'created_at' => carbon()->setDate(2020, 12, 3)->setTime(13, 25),
                ],
                [
                    'message'    => '1917, tem uns reviews super bons. ',
                    'direction'  => 'out',
                    'send_at'    => carbon()->setDate(2020, 12, 3),
                    'created_at' => carbon()->setDate(2020, 12, 3)->setTime(13, 25),
                ],
                [
                    'message'    => 'Olha ai https://www.rottentomatoes.com/m/1917_2019',
                    'image'      => 'https://s3.us-west-2.amazonaws.com/secure.notion-static.com/3d5810f6-f1a7-4a2d-ae27-364ae071b0e4/Untitled.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAT73L2G45O3KS52Y5%2F20201204%2Fus-west-2%2Fs3%2Faws4_request&X-Amz-Date=20201204T195621Z&X-Amz-Expires=86400&X-Amz-Signature=1eb98c82cf14afb4d6b46fea6d71e813aad3ad727fa09971506842eb12ebc1ac&X-Amz-SignedHeaders=host&response-content-disposition=filename%20%3D%22Untitled.png%22',
                    'direction'  => 'out',
                    'send_at'    => carbon()->setDate(2020, 12, 3),
                    'created_at' => carbon()->setDate(2020, 12, 3)->setTime(13, 35),
                ],
                [
                    'message'    => 'Fechou. Qual o horario da sessão? ',
                    'direction'  => 'in',
                    'send_at'    => carbon()->setDate(2020, 12, 3),
                    'created_at' => carbon()->setDate(2020, 12, 3)->setTime(13, 37),
                ],
            ]);
    }
}
