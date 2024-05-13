<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new User([
            'nip'     => $row[0],
            'nama'     => $row[1],
            'email'    => $row[2],
            'role'    => $row[3],
            'jabatan'    => $row[4],
            'unit_kerja'    => $row[5],
            'password' => Hash::make($row[6]),
        ]);
    }
}
