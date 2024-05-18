<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserTest extends TestCase
{
    public function testCreateUser()
    {
        $request = new Request([
            'nip' => '12345678',
            'nama' => 'John Doe',
            'email' => 'john.doe@example.com',
            'role' => 'admin',
            'jabatan' => 'Manager',
            'unit_kerja' => 'IT',
            'password' => bcrypt('secret'), // Pastikan password di-hash
        ]);

        User::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'jabatan' => $request->jabatan,
            'unit_kerja' => $request->unit_kerja,
            'password' => $request->password,
        ]);

        $this->assertDatabaseHas('users', [
            'nip' => '12345678',
            'nama' => 'John Doe',
            'email' => 'john.doe@example.com',
            'role' => 'admin',
            'jabatan' => 'Manager',
            'unit_kerja' => 'IT',
        ]);

        // Verify the password is hashed
        $user = User::where('nip', '12345678')->first();
        $this->assertTrue(Hash::check('secret', $user->password));
    }
}
