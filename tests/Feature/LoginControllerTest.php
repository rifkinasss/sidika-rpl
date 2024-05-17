<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginControllerTest extends TestCase
{
    public function test_valid_login_with_email_pegawai()
    {
        $response = $this->post('/login', [
            'email' => 'pegawai@urproj.com',
            'password' => 'password'
        ]);

        $response->assertRedirect(route('pegawai'));
        $response->assertSessionHas('alert', 'Login berhasil! Selamat datang, pegawai.');
        $this->assertAuthenticated();
        $this->assertEquals('pegawai', Auth::user()->role);
    }

    public function test_valid_login_with_email_admin()
    {
        $response = $this->post('/login', [
            'email' => 'admin@urproj.com',
            'password' => 'password'
        ]);

        $response->assertRedirect(route('admin'));
        $response->assertSessionHas('alert', 'Login berhasil! Selamat datang, admin.');
        $this->assertAuthenticated();
        $this->assertEquals('admin', Auth::user()->role);
    }

    public function test_valid_login_with_email_superadmin()
    {
        $response = $this->post('/login', [
            'email' => 'superadmin@urproj.com',
            'password' => 'password'
        ]);

        $response->assertRedirect(route('superadmin'));
        $response->assertSessionHas('alert', 'Login berhasil! Selamat datang, superadmin.');
        $this->assertAuthenticated();
        $this->assertEquals('superadmin', Auth::user()->role);
    }

    public function test_invalid_credentials()
    {
        $response = $this->post('/login', [
            'email' => 'invalid@example.com',
            'password' => 'wrongpassword'
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Invalid credentials');
        $this->assertGuest();
    }

    public function test_unauthorized_role()
    {
        // Create a user with an unauthorized role
        User::create([
            'email' => 'unauthorized@example.com',
            'nip' => '999999',
            'nama' => 'Unauthorized User',
            'password' => bcrypt('password'),
            'role' => 'unauthorized'
        ]);

        $response = $this->post('/login', [
            'email' => 'unauthorized@example.com',
            'password' => 'password'
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Unauthorized access detected. Please contact support.');
        $this->assertGuest();
    }
}
