<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;

class WebTest extends TestCase
{
    /**
     * Test that the welcome view is returned.
     */
    public function test_welcome_view(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('index');
    }
}