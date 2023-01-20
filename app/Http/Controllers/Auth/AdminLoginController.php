<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserRole;
use App\Admin;
use App\Menu;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{

    use AuthenticatesUsers;
    
    public function __construct()
    {
        //$this->middleware('guest:admin');
    }
    public function showloginform()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email|exists:admins,email',
                'password' => 'required|min:6'
            ]);

            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);
                return redirect()->back()->withInput($request->only('email', 'remember'))->with('gagal', 'Too many logins. Wait for 60 seconds for next login');
            }    

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                
                // Clear Login Attemps
                $this->clearLoginAttempts($request);

                // Get Admin's Access based on Role
                $user = Admin::with('role')->where('email', $request->email)->first();
                $userRole = UserRole::where('id',$user->role_id)->first();

                $menu = [];
                
                if ($userRole) {

                    if ($userRole->menu_ids == null) { // Super Admin
                        $menus = DB::table('menu')
                            ->select('id')
                            ->get();

                        foreach ($menus as $item) {
                            $menu[] = $item->id;
                        }
                        
                    } else { // Other Admin
                        $menu = explode(',', $userRole->menu_ids);
                    }
                }

                // \Artisan::call('storage:link');
                    
                session()->put('accessible_menus', $menu);
                
                return redirect()->intended(route('admin.dashboard'));

            }else{
                $this->incrementLoginAttempts($request);
            }

            return redirect()->back()->withInput($request->only('email', 'remember'))->with('gagal', 'Login gagal. Username/password salah.');

        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Login failed. ' . $e->getMessage());
        }
    }

    // public function logout(Request $request)
    // {
    //     Auth::guard('admin')->logout();
    //     $request->session()->flush();
    //     $request->session()->regenerate();
    //     return redirect()->guest(route('admin.login'));
    // }
    public function logout(Request $request)
    {
        //$this->guard('admin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/admin/login');
    }
}
