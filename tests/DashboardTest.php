<?php

namespace Tests\Unit;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * Test that the dashboard view is returned.
     */
    public function test_dashboard_view(): void
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    /**
     * Test that the open tasks section is displayed.
     */
    public function test_open_tasks_section(): void
    {
        $response = $this->get('/dashboard');
        $response->assertSee('Open Tasks');
        $response->assertSee('Display a list of open tasks here.');
        $response->assertSee('Another option is to list a count of closed Tasks');
    }

    /**
     * Test that the closed tasks section is displayed.
     */
    public function test_closed_tasks_section(): void
    {
        $response = $this->get('/dashboard');
        $response->assertSee('Closed Tasks');
        $response->assertSee('Display a list of closed tasks here.');
        $response->assertSee('Another option is to list a count of closed Tasks');
    }
}