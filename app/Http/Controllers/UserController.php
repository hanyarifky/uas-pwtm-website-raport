<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view(
            'admin.user.index',
            [
                "users" => User::all()
            ]
        );
    }

    public function create()
    {
        return view(
            'admin.user.create',
            [
                "data_siswa" => Siswa::all()
            ]
        );
    }

    public function createSiswa()
    {
        return view(
            'admin.user.createSiswa',
            [
                "data_siswa" => Siswa::all()
            ]
        );
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validateData = $request->validate(
            [
                "nama" => "required|string",
                "userid" => "required|string|unique:users,userid",
                "email" => "required|email|unique:users,email",
                "nomor_telepon" => "required|string",
                "role" => "required|in:admin,siswa",
                "password" => "string|min:8",
                'siswa_id' => 'nullable|exists:siswas,id'
            ]
        );
        bcrypt($validateData['password']);

        // dd($request->all());

        try {
            User::create($validateData);

            alert()->success('Tambah User Sukses', 'Berhasil Menambahkan Data User');
            return redirect('/admin/kelola-user');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function storeSiswa(Request $request)
    {
        // dd($request->all());

        $dataSiswa = Siswa::find($request->siswa_id);
        // return $dataSiswa;

        $validateData = $request->validate(
            [
                "userid" => "required|string|unique:users,userid",
                "password" => "string|min:8",
                'siswa_id' => 'nullable|exists:siswas,id'
            ]
        );
        bcrypt($validateData['password']);
        $validateData['nama'] = $dataSiswa->nama;
        $validateData['email'] = $dataSiswa->email;
        $validateData['nomor_telepon'] = $dataSiswa->nomor_telepon;
        $validateData['role'] = "siswa";

        // dd($request->all());

        try {
            User::create($validateData);

            alert()->success('Tambah User Sukses', 'Berhasil Menambahkan Data User');
            return redirect('/admin/kelola-user');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function edit(User $user)
    {
        return view(
            'admin.user.edit',
            [
                "data_siswa" => Siswa::all(),
                "user" => $user
            ]
        );
    }

    public function update(Request $request, User $user)
    {
        // dd($request->all());
        // return $request->all();
        // return $user;

        $rulesData =
            [
                "nama" => "required|string",
                // "userid" => "required|string|unique:users,userid",
                // "email" => "required|email|unique:users,email",
                "nomor_telepon" => "required|string",
                "role" => "required|in:admin,siswa",
                'siswa_id' => 'nullable|exists:siswas,id'
            ];
        // dd($request->all());

        if ($request->email != $user->email) {
            $rulesData['email'] = "required|email|unique:users,email";
        }
        if ($request->userid != $user->userid) {
            $rulesData['userid'] = "required|string|unique:users,userid";
        }

        $validateData = $request->validate($rulesData);

        try {

            User::where('id', $user->id)->update($validateData);

            alert()->success('Update Sukses', 'Berhasil Mengupdate Data');
            return redirect('/admin/kelola-user');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Menambahkan Data');
            return $e;
        }
    }

    public function destroy(User $user)
    {
        alert()->success('Berhasil di Hapus', 'Data User Berhasil di Hapus');
        User::destroy($user->id);

        return redirect('/admin/kelola-user');
    }

    public function halamanGantiPassword(User $user)
    {
        return view('admin.user.ganti_password', ['user' => $user]);
    }

    public function gantiPassword(Request $request, User $user)
    {

        // dd($request->all());
        try {
            User::where('userid', $user->userid)->update([
                "password" => Hash::make($request->password)
            ]);

            alert()->success('Ganti Password Berhasil', 'Berhasil Ganti Password');
            return redirect('/admin/kelola-user');
        } catch (\Exception $e) {
            alert()->error('Gagal Ganti Password', 'Gagal Ganti Data');
            return $e;
        }
    }
}
