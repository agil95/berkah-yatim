<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserRole;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
        $user = Auth::user();
		// Auth::user()->authorizeRoles($user->Role->menu_ids,'9');

        $users = UserRole::orderBy('id', 'asc')->get();
        foreach ($users  as $view) {
        $data = explode(',', $view->menu_ids);
        foreach($data as $key => $value){
            $p = Menu::Where('id',$value)->first();
            if($p!=null)
            $view->menu_names .= $p['name'].", ";                    
                }
                    $view->zone_names = substr($view->zone_names, 0, -2);
            }


        return view('user_role.index', compact('users'));
    }
    
    public function store(Request $request) {

        $user = Auth::user();
		// Auth::user()->authorizeRoles($user->Role->menu_ids,'9');

        $this->validate($request, [
            'name' => 'required|min:3',
            'menu_ids' => 'required'
        ]);

        $user = new UserRole();
        $user->id = $request->input("id");
        $user->name = $request->input("name");
        $user->menu_ids=  implode(',',$request->input("menu_ids"));
        $user->save();

        return redirect()->route('user_role.index')->with('message', 'Menyimpan berhasil.');
    }

    public function update(Request $request, $id) {

        $user = Auth::user();
		// Auth::user()->authorizeRoles($user->Role->menu_ids,'9');

        $this->validate($request, [
            'name' => 'required|min:3',
            'menu_ids' => 'required'
        ]);

        $user = UserRole::findOrFail($id);
        $user->name = $request->input("name");
        $user->menu_ids=  implode(',',$request->input("menu_ids"));
        $user->save();

        return redirect()->route('user_role.index')->with('message', 'Memperbaharui berhasil.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $user = Auth::user();
		// Auth::user()->authorizeRoles($user->Role->menu_ids,'9');

        $menus = Menu::orderBy('id', 'asc')->get();

        return view('user_role.create',compact('menus'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $user = Auth::user();
		// Auth::user()->authorizeRoles($user->Role->menu_ids,'9');

        $user = UserRole::findOrFail($id);

        return view('user_role.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
		$user = Auth::user();
		// Auth::user()->authorizeRoles($user->Role->menu_ids,'9');

        $role = UserRole::findOrFail($id);
        $menus = Menu::orderBy('id', 'asc')->get();

        return view('user_role.edit',compact('role','menus'));
    }

    public function destroy($id) {
        $user = Auth::user();
		// Auth::user()->authorizeRoles($user->Role->menu_ids,'9');

        $user = UserRole::findOrFail($id);
        $user->delete();

        return redirect()->route('user_role.index')->with('message', 'Item deleted successfully.');
    }

}
