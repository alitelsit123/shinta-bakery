<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DaftarAkunTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'email' => 'member@gmail.com',
            'password' => bcrypt('member'),
        ]);

        $response = $this->post('/login', [
            'email' => 'member@gmail.com',
            'password' => 'member',
        ]);

        $response->assertRedirect('/'); // or wherever your application redirects to upon successful login
        $this->assertAuthenticatedAs($user);
    }
}