<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('superadmin.user', compact('users'));
    }
    public function create()
    {
        return view('superadmin.create-user');
    }
    // public function import(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|file|mimes:xls,xlsx'
    //     ]);

    //     $file = $request->file('file');

    //     Excel::import(new UsersImport, $file);

    //     return redirect()->back()->with('success', 'Pengguna berhasil diimpor.');
    // }
    public function store(Request $request)
    {
        User::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'jabatan' => $request->jabatan,
            'unit_kerja' => $request->unit_kerja,
            'password' => $request->password,
        ]);

        return redirect()->route('dashboard-superadmin.user.index');
    }
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('superadmin.edit-user', compact('user'));
    }
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'jabatan' => $request->jabatan,
            'unit_kerja' => $request->unit_kerja,
            'password' => $request->password,
        ]);

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        return redirect()->route('user.index');
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
