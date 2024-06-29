<?php

namespace App\Http\Controllers;

use App\Models\KelompokLatihan;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function kolat() {
        $kolat = KelompokLatihan::whereHas('users', function($query) {
            $query->where('role_id', 2);
        })->get();

        $formB = KelompokLatihan::all();

        return view('admin.datakolat', compact('kolat', 'formB'));
    }

    public function update(Request $request, $id_kolat){

        // $validator = 
        $user = KelompokLatihan::findOrFail($id_kolat);
        $user->nama_kontingen = $request->input('nama_kontingen');
        $user->nama_pelatih_1 = $request->input('nama_pelatih_1');
        $user->nama_pelatih_2 = $request->input('nama_pelatih_2');
        $user->save();
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function register() {
        return view('register');
    }

    public function actionregister(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rules, User::$messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $user = User::create([
            'role_id' => 2,
            'nama' => $request->nama_kontingen,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user = DB::table('users')->orderBy('id', 'desc')->select('id')->first();
        $kolat = KelompokLatihan::create([
            'id' => $user->id,
            'user_id' => $user->id,
            'nama_kontingen' => $request->nama_kontingen,
            'nama_pelatih_1' => $request->nama_pelatih_1,
            'nama_pelatih_2' => $request->nama_pelatih_2,
        ]);


        return redirect()->back()->with('success', 'Anda berhasil register');
    }

    public function delete($id_kolat){
        $idUser = KelompokLatihan::find($id_kolat)->user_id;
        $user = User::findOrFail($idUser);
        $user->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function resetpassword($id_kolat){
        $idUser = KelompokLatihan::find($id_kolat)->user_id;
        $user = User::findOrFail($idUser);
        $user->password = Hash::make(12345678);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil direset');

    }

    public function profile()
    {
        $userId = Auth::user();
        $user = KelompokLatihan::where('user_id' ,$userId->id)->first();

        return view('kolat.profile', compact('user'));
    }

    public function update_profile(Request $request)
    {

        $userId = Auth::user()->id;
        $kolatId = KelompokLatihan::where('user_id', $userId)->first()->id_kolat;
        $user = KelompokLatihan::findOrFail($kolatId);

        $akun = User::findOrFail($userId);
        $akun->email = $request->email;
        if (!empty($request->password)) {
            dd('asd');
            $akun->password = $request->password;
        }
        $akun->save();

        $user->nama_kontingen = $request->nama_kontingen;
        $user->nama_pelatih_1 = $request->nama_pelatih_1;
        $user->nama_pelatih_2 = $request->nama_pelatih_2;
        $user->save();

        return redirect()->back()->with('success', 'Profile berhasil diperbarui');
    }

    public function update_foto(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            $userId = Auth::user()->id;
            $user = KelompokLatihan::where('user_id', $userId)->first();

            // Hapus foto profil lama jika ada
            if ($user->image) {
                Storage::delete($user->image);
                Storage::delete('public/img-profile/' . $user->hashname);
            }

            $image = $request->file('image');
            $hashName = $image->hashName();

            // Simpan foto profile
            $path = $image->store('public/img-profile');
            // Upload foto profil baru
            // $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $image = asset('storage/img-profile/' . $hashName);
            $user->image = $image;
            $user->hashname = $hashName;
            $user->save();

            return redirect()->back()->with('success', 'Foto berhasil diperbarui');
        }
    }
}
