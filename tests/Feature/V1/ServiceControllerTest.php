<?php
namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceControllerTest extends TestCase
{
    use RefreshDatabase;

    private $adminUser;
    private $headers;

    public function setUp(): void
    {
        parent::setUp();

        // Create an admin user fresh in the test DB
        $admin = \App\Models\User::factory()->create([
            'role' => 'admin', // Adjust based on your role field
        ]);

        $this->actingAs($admin, 'sanctum');

        $this->headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . $admin->createToken('admin-token')->plainTextToken,
        ];
    }

    public function test_index_returns_services()
    {
        Service::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/services', $this->headers);

        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    public function test_store_creates_service()
    {
        $payload = [
            'name'        => 'Test Service',
            'description' => 'This is a test service',
            'price'       => 500,
            'status'      => true,
        ];

        $response = $this->postJson('/api/v1/services', $payload, $this->headers);

        $response->assertStatus(201)
            ->assertJsonStructure(['data' => ['id', 'name', 'description', 'price', 'status']]);

        $this->assertDatabaseHas('services', ['name' => 'Test Service']);
    }

    public function test_show_returns_specific_service()
    {
        $service = Service::factory()->create();

        $response = $this->getJson("/api/v1/services/{$service->id}", $this->headers);

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'name']]);
    }

    public function test_update_service()
    {
        $service = Service::factory()->create();

        $updated = [
            'name'        => 'Updated Service',
            'description' => 'Updated desc',
            'price'       => 999,
            'status'      => true,
        ];

        $response = $this->putJson("/api/v1/services/{$service->id}", $updated, $this->headers);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Updated Service']);

        $this->assertDatabaseHas('services', ['name' => 'Updated Service']);
    }

    public function test_delete_service()
    {
        $service = Service::factory()->create();

        $response = $this->deleteJson("/api/v1/services/{$service->id}", [], $this->headers);

        $response->assertStatus(200)
            ->assertJsonFragment(['message' => 'Service deleted successfully']);

        $this->assertDatabaseMissing('services', ['id' => $service->id]);
    }
}
