<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\LogActivity;


class UserController extends Controller
{
    public function registration(){
        $datas = DB::table('users')
            ->get();

        return view('admin.userregister',[
            'users' => $datas
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->isAdmin = $request->isAdmin;
        $user->isActive = $request->isActive;
        $user->save();

        $datas = DB::table('users')
            ->get();

        LogActivity::addToLog('New User Added - name -'.$request->name.'email '. $request->email);
        return redirect()->route('admins.userregister')
            ->with('success','User created successfully')>with( 'users', $datas );
    }
}
