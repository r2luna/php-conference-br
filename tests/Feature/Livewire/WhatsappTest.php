<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Messages;
use App\Http\Livewire\Whatsapp;
use App\Models\Contact;
use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class WhatsappTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_list_all_contacts()
    {
        Contact::factory()->has(Message::factory())->count(3)->create();

        Livewire::test(Whatsapp::class)
            ->assertViewHas('contacts', fn($c) => $c->count() == 3);
    }

    /** @test */
    public function it_should_be_able_to_search_a_contact()
    {
        Contact::factory()->has(Message::factory())->create([
            'name' => 'Joe Doe',
        ]);

        Contact::factory()->has(Message::factory())->create([
            'name' => 'Jane Doe',
        ]);

        Livewire::test(Whatsapp::class)
            ->assertViewHas('contacts', fn($c) => $c->count() == 2)
            ->set('search', 'Jane')
            ->assertViewHas('contacts', fn($c) => $c->count() == 1)
            ->assertSee('Jane Doe')
            ->assertDontSee('Joe Doe');
    }

    /** @test */
    public function it_should_emit_an_event_when_select_a_contact()
    {
        Contact::factory()->has(Message::factory())->count(3)->create();

        Livewire::test(Whatsapp::class)
            ->call('selectContact', 1)
            ->assertEmitted('contactSelected', 1)
            ->assertSet('selectedContact.id', '1');
    }








    /** @test */
    public function text_message_should_be_required()
    {
        $contact = Contact::factory()->has(Message::factory())->create();

        Livewire::test(Messages::class, compact('contact'))
            ->call('save')
            ->assertHasErrors([
                'text' => 'required',
            ]);
    }


    /** @test */
    public function it_should_be_able_to_create_a_message()
    {
        $contact = Contact::factory()->has(Message::factory())->create();

        Livewire::test(Messages::class, compact('contact'))
            ->set('text', 'Message Test')
            ->call('save');

        $this->assertDatabaseHas('messages', [
            'contact_id' => $contact->id,
            'message'    => 'Message Test',
        ]);
    }

    /** @test */
    public function it_should_be_able_to_send_an_image_with_a_message()
    {
        Storage::fake();

        $file = UploadedFile::fake()->image('image.png');

        /** @var Contact $contact */
        $contact = Contact::factory()->has(Message::factory())->create();

        Livewire::test(Messages::class, compact('contact'))
            ->set('text', 'Message Test')
            ->set('image', $file)
            ->call('save', 'uploaded-image.png');

        Storage::disk('public')->assertExists($contact->messages()->latest()->first()->image);
    }
}
