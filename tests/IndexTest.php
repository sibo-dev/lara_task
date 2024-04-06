<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;

class IndexTest extends TestCase
{
    use InteractsWithViews, MakesHttpRequests;

    /**
     * Test that the welcome view is returned.
     */
    public function test_welcome_view(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('index');
    }

    /**
     * Test that the report view is rendered correctly.
     */
    public function test_report_view(): void
    {
        $response = $this->get('/report');
        $response->assertStatus(200);
        $response->assertViewIs('report');

        $response->assertSee(__('Report An Issue'));
        $response->assertSee(__('Create Issue'));
    }

    public function test_index_view_has_link_tag(): void
{
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertViewIs('index');
    $response->assertSee('<link rel="preconnect" href="https://fonts.bunny.net">');
}

public function test_index_view_has_title(): void
{
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertViewIs('index');
    $response->assertSee('<title>Laravel</title>');
}

public function test_index_view_has_fonts_link(): void
{
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertViewIs('index');
    $response->assertSee('<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />');
}

public function test_index_view_has_styles(): void
{
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertViewIs('index');
    $response->assertSee('<style>');
}
}