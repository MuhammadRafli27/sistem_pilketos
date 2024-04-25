<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Illuminate\Validation\ValidationException;
// use Illuminate\Foundation\Auth\User;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        // $siswas = User::where('level', '!=', 1)->paginate(5);
        $siswa = User::where('username', 'like', '%'.$keyword. '%')
            ->orWhere('nis', 'like', '%'.$keyword. '%')
            ->orWhere('nisn', 'like', '%'.$keyword. '%')
            ->orWhere('kelas', 'like', '%'.$keyword. '%')->paginate(5);
        return view('/siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create.tambah-data-siswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'level' => 'required',
                'username' => 'required',
                'password' => 'required|min:5|max:20|unique:users',
                'password_confirm' => 'required|min:5|max:20|same:password',
                'nis' => 'required|size:10|unique:users',
                'nisn' => 'required|size:10|unique:users',
                'kelas' => 'required',
            ], [
                'username.required'=>'Username tidak boleh kosong!!!',
                'password.required'=>'Password tidak boleh kosong!!!',
                'password.min'=>'Minimal Password 5 Character!!!',
                'password.max' => 'Maksimal Password 20 Character!!!',
                'password_confirm.required'=>'Password Confirmation tidak boleh kosong!!!',
                'password_confirm.min'=>'Minimal Password Confirmation 5 Character!!!',
                'password_confirm.same'=>'Password Confirmation Tidak Sesuai!!!',
                'password.unique'=>'Password atau NIS Sudah Ada atau Sudah Terdaftar!!!',
                'nis.required'=>'NIS tidak boleh kosong!!!',
                'nis.size'=>'NIS Harus 10 Angka tidak boleh lebih atau kurang!!!',
                'nis.unique'=>'NIS Sudah Ada atau Sudah Terdaftar!!!',
                'nisn.required'=>'NISN tidak boleh kosong!!!',
                'nisn.size'=>'NISN Harus 10 Angka tidak boleh lebih atau kurang!!!',
                'nisn.unique'=>'NISN Sudah Ada atau Sudah Terdaftar!!!',
            ]
        );
        // $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        Alert::success('Success', 'Data Siswa Berhasil Ditambahkan!!!');
        return redirect('/siswa')->with('success', 'Data Siswa Berhasil Ditambahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('/edit/ubah-data-siswa',[
            'siswa' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = User::findorfail($id);
        $validated = $request->validate(
            [
                'level' => 'required',
                'username' => 'required',
                'password' => 'required|min:5|max:20',
                'password_confirm' => 'required|min:5|max:20|same:password',
                'nis' => 'required|size:10',
                'nisn' => 'required|size:10',
                'kelas' => 'required',
            ], [
                'username.required'=>'Username tidak boleh kosong!!!',
                'password.required'=>'Password tidak boleh kosong!!!',
                'password.min'=>'Minimal Password 5 Character!!!',
                'password.max' => 'Maksimal Password 20 Character!!!',
                'password_confirm.required'=>'Password Confirmation tidak boleh kosong!!!',
                'password_confirm.min'=>'Minimal Password Confirmation 5 Character!!!',
                'password_confirm.same'=>'Password Confirmation Tidak Sesuai!!!',
                'nis.required'=>'NIS tidak boleh kosong!!!',
                'nis.size'=>'NIS Harus 10 Angka tidak boleh lebih atau kurang!!!',
                'nisn.required'=>'NISN tidak boleh kosong!!!',
                'nisn.size'=>'NISN Harus 10 Angka tidak boleh lebih atau kurang!!!',
            ]
        );
        // $validated['password'] = bcrypt($validated['password']);
        $siswa->update($validated);
        Alert::success('Success', 'Data Siswa Berhasil DiUbah!!!');
        return redirect('/siswa')->with('success', 'Data Siswa Berhasil DiUbah!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Alert::error('Success', 'Data Siswa Berhasil DiHapus!!!');
        return redirect('/siswa')->with('delete', 'Data Siswa Berhasil Di Hapus!!!');
    }
    public function password()
    {
        return view('/change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:5|max:20|confirmed',
            'password_confirmation' => 'required|min:5|max:20'
        ],[
            'current_password.current_password' => 'Password lama tidak boleh kosong!!!',
            'password.required' => 'Password baru tidak boleh kosong!!!',
            'password.min' => 'Minimal Password baru 5 Character!!!',
            'password.max' => 'Maksimal Password baru 20 Character!!!',
            'password_confirmation' => 'Password Confirmation tidak boleh kosong!!!',
            'password_confirmation.min' => 'Minimal Password Confirmation 5 Character!!!',
            'password_confirmation.max' => 'Minimal Password Confirmation 20 Character!!!',
        ]
        );

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => ($request->password)]);
            Alert::success('Berhasil', 'Password Anda Berhasil di Ganti!!!');
            return redirect('/siswa')->with('success', 'Password Anda Berhasil di Ganti!!!');
        }
        throw ValidationException::withMessages([
            'current_password' => 'Password lama tidak sesuai'
        ]);
    }
    public function importexcel(Request $request)
    {
        $file = $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv|max:2048'
        ],[
            'file.required' => 'File ini tidak boleh kosong!!!',
            'file.mimes' => 'File yang anda upload bukan XlS, XLSX, or CSV!!!',
            'file.max' => 'Maksimal File yang anda masukan 2048'
        ]
        );

        //Ambil file Excel dari form upload
        $file = $request->file('file');

        //Baca data Excel menggunakan PhpSpreadsheet
        $reader = new Xlsx();
        $spreadsheet = $reader->load($file);
        $worksheet = $spreadsheet->getActiveSheet();

        //Ambil data baris per baris
        $rows = $worksheet->toArray();
        $header = array_shift($rows);

        //Proses data baris per baris
        foreach ($rows as $row){
            $data = array_combine($header, $row);

            //Simpan data ke database
            User::create([
                'level' => $data['level'],
                'username' => $data['username'],
                'password' => $data['password'],
                'nis' => $data['nis'],
                'nisn' => $data['nisn'],
                'kelas' => $data['kelas'],
            ]);
        }
        Alert::success('Success', 'Data Excel Berhasil DiImport!!!');
        return redirect('/siswa')->with('success', 'Data Excel Berhasil DiImport!!!');
    }
}
?>
