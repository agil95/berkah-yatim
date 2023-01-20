<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller {

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

        $users = Menu::orderBy('id', 'asc')->get();

        return view('menu.index', compact('users'));
    }
    
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|min:3|unique:menu',
            'parent' => 'required|exists:menu,id'
        ]);
		
        $user = new Menu();
        $user->id = $request->input("id");
        $user->name = $request->input("name");
        $user->parent_id = $request->input("parent");
        $user->save();

        return redirect()->route('menu.index')->with('message2', 'Menyimpan menu berhasil.');
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'name' => 'required|min:3|unique:menu',
            'parent' => 'required|exists:menu,id'
        ]);		

        $user = Menu::findOrFail($id);
        $user->name = $request->input("name");
        if($user->parent_id!=null)
            $user->parent_id = $request->input("parent");
        $user->save();

        return redirect()->route('menu.index')->with('message2', 'Memperbaharui menu berhasil.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $menus = Menu::where('parent_id', null)->get();

        return view('menu.create',compact('menus'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
	
        $menu = Menu::findOrFail($id);

        return view('menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {

        $menu = Menu::findOrFail($id);

        $menus = Menu::where('parent_id', null)->get();

        return view('menu.edit',compact('menu','menus'));
    }

    public function destroy($id) {

        $user = Menu::findOrFail($id);
        $user->delete();

        return redirect()->route('menu.index')->with('message', 'Item deleted successfully.');
    }

    public function menuStatus($id, $status)
    {
        $user = Auth::user();

        $produk = \App\Menu::findOrFail($id);
        if ($produk) {
            $produk->status = $status;
            $produk->created_by = $user->id;
            $produk->save();
        }

        return redirect()->route('menu.index')->with('status', 'Item updated successfully.');
    }

}
