<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_login_and_access_dashboard(): void
    {
        // Create an admin user
        $admin = User::factory()->create([
            'is_admin' => true,
            'password' => bcrypt('password'),
        ]);

        // Attempt login
        $response = $this->post('/login', [
            'email' => $admin->email,
            'password' => 'password',
        ]);

        // Assert redirect to admin dashboard
        $response->assertRedirect('/admin/dashboard');

        // Assert user is authenticated
        $this->assertAuthenticatedAs($admin);

        // Assert can access admin dashboard
        $dashboardResponse = $this->get('/admin/dashboard');
        $dashboardResponse->assertStatus(200);
    }

    public function test_non_admin_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $response = $this->get('/admin/dashboard');
        $response->assertStatus(403);
    }
}
