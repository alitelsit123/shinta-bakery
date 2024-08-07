<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        $data = collect([
            'name' => 'member',
            'email' => 'member@gmail.com',
            'phone' => '089237487234',
            'role' => 'member',
            'password' => \Hash::make('member'), // password
          ]);
          $user = \App\Models\User::where($data->except(['password'])->toArray())->first();

        $response = $this->post('/login', [
            'email' => 'member@gmail.com',
            'password' => 'member',
        ]);

        $response->assertRedirect('/'); // or wherever your application redirects to upon successful login
        $this->assertAuthenticatedAs($user);
    }
}