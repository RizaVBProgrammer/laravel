<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request){
        // Validasi
        $request->validate([
            'name' =>  'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        // Membuat instance model User dan mengisi propertinya dengan data dari request
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password); // Mengenkripsi password menggunakan fungsi bcrypt

        // Menyimpan data ke dalam database
        $user->save();

        return redirect()->route('user.index')->with('success','User Berhasil Dibuat');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('users.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
            'role' => 'required'

        ]);

        // Temukan pengguna yang akan diperbarui
        $user = User::findOrFail($id);

        // Perbarui data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        
        // Perbarui password jika ada yang diinputkan
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman index user dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }


    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user.index') ->with('success','User Berhasil Dihapus');
    }
}
