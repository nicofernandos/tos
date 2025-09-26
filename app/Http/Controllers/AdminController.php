<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Profile
    public function profile()
    {
        $data['profile'] = FacadesDB::table('users')->where('id', Auth::user()->id)->first();
        return view('admin.profile', $data);
    }

    public function profileupdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ]);
        $data = [
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
        ];
        if ($request->input('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        FacadesDB::table('users')->where('id', Auth::user()->id)->update($data);

        return redirect('profile')->with('success', 'Data Berhasil Diubah');
    }

}