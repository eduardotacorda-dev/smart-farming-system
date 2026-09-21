<?php

namespace Tests\Feature;

use App\Models\Farm;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FarmStructureApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_farm_field_and_zone(): void
    {
        $user = $this->createUser();

        $farmResponse = $this->actingAs($user)->postJson('/api/v1/farms', [
            'name' => 'North Farm',
            'location' => 'Singapore',
        ]);

        $farmResponse->assertCreated()->assertJsonPath('data.name', 'North Farm');
        $farmId = $farmResponse->json('data.id');

        $fieldResponse = $this->actingAs($user)->postJson("/api/v1/farms/{$farmId}/fields", [
            'name' => 'Tomato Field',
            'area_hectares' => 1.25,
        ]);

        $fieldResponse->assertCreated()->assertJsonPath('data.name', 'Tomato Field');
        $fieldId = $fieldResponse->json('data.id');

        $zoneResponse = $this->actingAs($user)->postJson("/api/v1/fields/{$fieldId}/zones", [
            'name' => 'Irrigation Zone A',
        ]);

        $zoneResponse->assertCreated()->assertJsonPath('data.name', 'Irrigation Zone A');
    }

    public function test_user_cannot_view_another_users_farm(): void
    {
        $owner = $this->createUser('owner@example.com');
        $otherUser = $this->createUser('other@example.com');
        $farm = Farm::create([
            'owner_id' => $owner->id,
            'name' => 'Private Farm',
        ]);

        $this->actingAs($otherUser)
            ->getJson("/api/v1/farms/{$farm->id}")
            ->assertForbidden();
    }

    public function test_farm_creation_requires_a_name(): void
    {
        $this->actingAs($this->createUser())
            ->postJson('/api/v1/farms', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('name');
    }

    private function createUser(string $email = 'manager@example.com'): User
    {
        $role = Role::firstOrCreate(['slug' => 'farm_manager'], ['name' => 'Farm Manager']);

        return User::factory()->create([
            'email' => $email,
            'role_id' => $role->id,
        ]);
    }
}
