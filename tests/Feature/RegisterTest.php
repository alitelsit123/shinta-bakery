<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register()
    {
        $data = collect([
            'name' => 'member',
            'email' => 'member@gmail.com',
            'phone' => '089237487234',
            'role' => 'member',
            'password' => 'member', // password
          ]);

        $response = $this->post('/register', $data->toArray());

        $response->assertRedirect('/'); // or wherever your application redirects to upon successful register
    }
}