<?php

namespace Tests\Feature\Api;

use App\AdminUser;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminUserTest extends TestCase
{
    use RefreshDatabase;

    private $adminUser;

    public function testIndex()
    {
        $this->WithoutMiddleware();
        $adminUser1 = factory(AdminUser::class)->create();
        $adminUser2 = factory(AdminUser::class)->create();

        $response = $this->json('GET', '/api/admin_users');
        $response
            ->assertStatus(200)
            ->assertJson(
                [
                    [
                        'id' => $adminUser1->id,
                        'name' => $adminUser1->name,
                        'email' => $adminUser1->email,
                    ],
                    [
                        'id' => $adminUser2->id,
                        'name' => $adminUser2->name,
                        'email' => $adminUser2->email,
                    ]
                ]
            );
    }
}
