<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_homepage_renders_the_lincoln_welcome_page(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Welcome to Lincoln')
            ->assertSee('View student directory');
    }
}
