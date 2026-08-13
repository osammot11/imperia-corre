<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_visitor_can_subscribe_for_updates(): void
    {
        $response = $this->postJson(route('newsletter.store'), [
            'email' => 'runner@example.com',
        ]);

        $response->assertOk()->assertJsonStructure(['message']);
        $this->assertDatabaseHas('newsletter_subscribers', [
            'email' => 'runner@example.com',
        ]);
    }

    public function test_an_invalid_email_is_rejected(): void
    {
        $this->from('/')->post(route('newsletter.store'), [
            'email' => 'non-valida',
        ])->assertRedirect('/')->assertSessionHasErrors('email');
    }
}
