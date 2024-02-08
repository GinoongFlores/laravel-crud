<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_for_grades(): void
    {
        $response = $this->get('/grade/create');
        $response->assertStatus(200);
    }

    // public function test_the_application_returns_a_successful_response_for_grades_edit(): void
    // {
    //     $response = $this->get('/grade/12/edit');
    //     $response->assertStatus(200);
    // }
}
