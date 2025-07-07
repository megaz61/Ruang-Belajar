<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function home()
    {
        // pick random from materi and paginate 4
        $materi = Materi::inRandomOrder()->paginate(4);
        return view('home', compact('materi'));
    }
    public function login()
    {
        return view('login.login');
    }
    public function loginGuru()
    {
        return view('login.loginGuru');
    }
    public function loginMR()
    {
        return view('login.loginMR');
    }
    public function loginSiswa()
    {
        return view('login.loginSiswa');
    }
    public function register()
    {
        return view('login.register');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'nip' => ['nullable', 'unique:users'],
            'username' => ['nullable', 'min:3', 'max:255', 'unique:users'],
            'nomor' => ['nullable'],
            'password' => ['required', 'min:6', 'max:255'],
            'User' => ['required', 'in:Guru,Mahasiswa/Relawan,Siswa'], // Menambah validasi untuk radio button
        ]);
        try {
            $validateData['password'] = Hash::make($validateData['password']);
            User::create($validateData);
        } catch (\Exception $e) {
            // Provide a more informative error message to the user
            return redirect()
                ->back()
                ->withInput()
                ->withErrors('Failed to create account. Please try again. Error: ' . $e->getMessage());
        }
        // dd($request->all());

        // If successful, redirect to the login page
        Alert::success('Success', 'Account created successfully. Please login.');
        return redirect('/masuk');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Success', 'Login Berhasil');
            return redirect('/');
        }
        return back()->withErrors('Login failed. Please try again.');
    }
    public function authenticateGuru(Request $request)
    {
        $credentials = $request->validate([
            'nip' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors('Login failed. Please try again.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function dashboard($id)
    {
        $user = User::find($id);
        $materi = Materi::where('user_id', $id)->get();
        $materiCount = Materi::where('user_id', $id)->count('id');
        return view('akun.index', compact('materi'));
    }

    public function uploadMateri($id)
    {
        $user = User::find($id);
        return view('akun.FormMateri');
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('akun.profile');
    }
    public function changePassword($id)
    {
        $user = User::find($id);
        return view('akun.changePassword');
    }
    public function editProfile($id)
    {
        $user = User::find($id);
        return view('akun.EditProfile');
    }
    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'nomor' => 'required',
            'gender' => 'required',
            'bio' => 'nullable',
        ]);
        $validatedData['foto'] = 'required|mimes:jpg,png';
        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName();
        $path = $file->move('FotoProfile', $fileName);
        $validateData['foto'] = $fileName;
        $user->name = $validateData['name'];
        $user->username = $validateData['username'];
        $user->nomor = $validateData['nomor'];
        $user->gender = $validateData['gender'];
        $user->bio = $validateData['bio'];
        $user->foto = $fileName;
        $user->save();
        Alert::success('Success', 'Profile updated successfully');
        return redirect()->back();
    }

    public function updatePassword(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        // Check if passwords match
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        // Update the user's password
        $user = User::find($id);
        if (!$user) {
            Alert::error('User Not Found', 'The user you are trying to update does not exist.');
            return redirect()->back();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Alert::success('Password Updated', 'Your password has been updated successfully.');
        return redirect()->back();
    }
}
