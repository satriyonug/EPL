<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Peserta;
use App\Pembayaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/menunggu-verifikasi';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => 'required|string|max:255',
            'jumlah_pertemuan' => 'required|in:8,12,16',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|min:10',
            'nomor_telepon' => 'required|string|min:6|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $session = User::create([
            'email' => $data['email'],
            'nama' => $data['nama'],
            'password' => bcrypt($data['password']),
        ]);
        $user = User::where('email', $data['email'])->value('id');
        Peserta::create([
          'id' => $user,
          'nama' => $data['nama'],
          'jenis_kelamin' => $data['jenis_kelamin'],
          'tanggal_lahir' => $data['tanggal_lahir'],
          'alamat' => $data['alamat'],
          'nomor_telepon' => $data['nomor_telepon'],
          'verifikasi' => '0',
          'sisa_kursus' => '0',
        ]);

        $id_peserta = Peserta::where('id', $user)->value('id_peserta');
        Pembayaran::create([
          'id_peserta' => $id_peserta ,
          'jumlah_kursus' => $data['jumlah_pertemuan'],
          'verifikasi' => '0',
        ]);
        return $session;
    }
}
