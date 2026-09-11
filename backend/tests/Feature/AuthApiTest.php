<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_register_as_a_viewer(): void
    {
        $this->seed(RoleSeeder::class);

        $response = $this->withHeader('Origin', 'http://localhost:3000')
            ->postJson('/api/v1/auth/register', [
                'name' => 'Farm Viewer',
                'email' => 'viewer@example.com',
                'password' => 'password-password',
                'password_confirmation' => 'password-password',
            ]);

        $response->assertCreated()
            ->assertJsonPath('user.email', 'viewer@example.com')
            ->assertJsonPath('user.role.slug', 'viewer');

        $this->assertAuthenticated('web');
    }

    public function test_guest_cannot_view_the_current_user(): void
    {
        $this->getJson('/api/v1/auth/me')->assertUnauthorized();
    }

    public function test_authenticated_user_can_view_their_profile(): void
    {
        $role = Role::create(['name' => 'Viewer', 'slug' => 'viewer']);
        $user = User::factory()->create(['role_id' => $role->id]);

        $this->actingAs($user)
            ->getJson('/api/v1/auth/me')
            ->assertOk()
            ->assertJsonPath('user.email', $user->email)
            ->assertJsonPath('user.role.slug', 'viewer');
    }

    public function test_invalid_credentials_are_rejected(): void
    {
        User::factory()->create([
            'email' => 'operator@example.com',
            'password' => 'correct-password',
        ]);

        $this->postJson('/api/v1/auth/login', [
            'email' => 'operator@example.com',
            'password' => 'incorrect-password',
        ])->assertUnprocessable()
            ->assertJsonValidationErrors('email');
    }

    public function test_user_can_login_and_logout(): void
    {
        $role = Role::create(['name' => 'Viewer', 'slug' => 'viewer']);
        $user = User::factory()->create([
            'role_id' => $role->id,
            'email' => 'login@example.com',
            'password' => 'correct-password',
        ]);

        $this->withHeader('Origin', 'http://localhost:3000')
            ->postJson('/api/v1/auth/login', [
                'email' => $user->email,
                'password' => 'correct-password',
            ])
            ->assertOk()
            ->assertJsonPath('user.email', $user->email);

        $this->assertAuthenticated('web');

        $this->withHeader('Origin', 'http://localhost:3000')
            ->postJson('/api/v1/auth/logout')
            ->assertNoContent();

        $this->assertGuest('web');
    }
}
