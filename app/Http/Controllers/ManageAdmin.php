<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\UserRole;
use App\Logs;
use DB;
use Illuminate\Validation\ValidationException;


class ManageAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = \App\Admin::all();
        return view('manageadmin.index', ['admin'=> $admin]);
        
    }

    public function logs()
    {
        $logs = \App\Logs::latest()
        ->get();
        
        return view('manageadmin.logs', ['logs'=> $logs]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=UserRole::orderBy('id', 'asc')->get();

        return view('manageadmin.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $validasi = $this->validate($request, [
                'name'=> 'required',
                'email'=> 'required|unique:admins',
                'role'=> 'required|exists:user_role,id',
                'fotoadmin' => 'image|mimes:jpeg,png,jpg|max:1024'
            ]);

            DB::beginTransaction();

            $user = new \App\Admin;
            $user->name     = $request->name;
            $user->email    = $request->email;
            $foto = $request->file('fotoadmin');
                if($foto){
                    $foto_path = $foto->store('fotoadmin', 'public');
                    $user->foto = $foto_path;
                }
            $user->role_id     = $request->role;
            $user->jkel     = $request->jkel;
            $user->phone    = $request->phone;
            $user->password = Hash::make($request->get('password'));
            $user->save();
            DB::commit();

            return Redirect()->route('manageadmin.index')->with('status', 'Admin berhasil ditambah');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Menyimpan admin gagal. ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = \App\Admin::findOrfail($id);
        return view('manageadmin.show', ['admin'=>$admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = \App\Admin::findOrfail($id);
        $roles=UserRole::orderBy('id', 'asc')->get();

        return view('manageadmin.edit', ['admin'=>$admin,'roles'=>$roles]);
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
        try{
            
        $this->validate($request, [
            'email'=> 'required',
            'name'=> 'required',
            'role'=> 'required|exists:user_role,id',
            'foto' => 'image|mimes:jpeg,png,jpg|max:1024'
        ]);

        DB::beginTransaction();

        $admin = \App\Admin::findOrfail($id);
        $admin->name    = $request->name;
        $admin->email    = $request->email;
        $admin->phone    = $request->nohp;
        $admin->jkel     = $request->jkel;
        $admin->role_id     = $request->role;
         $foto = $request->file('foto');
         $pass = $request->password;
        if($pass){
            $admin->password = Hash::make($request->get('password'));
        }
        if($foto){
            if($admin->foto && file_exists(storage_path('app/public/' . $admin->foto))) { 
                \Storage::delete('public/'. $admin->foto);
            }
            $foto_path = $foto->store('fotoadmin', 'public');
            $admin->foto = $foto_path;
        }
        $admin->save();
        DB::commit();

        return redirect()->route('manageadmin.index')->with('status', 'Admin berhasil diubah');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Mengubah admin gagal. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Auth::user()->id == $id)
        {
            return redirect()->back()->With('gagal', 'Gagal menghapus data, akun sedang digunakan ');
        }
        $delete = \App\Admin::findOrfail($id);
        if(file_exists(storage_path('app/public/' . $delete->foto) )) {
                \Storage::delete('public/'. $delete->foto);
            }
        $delete->delete();
        return redirect()->back()->With('status', 'Berhasil menghapus data');
    }
}
