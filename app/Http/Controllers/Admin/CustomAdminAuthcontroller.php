<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAdminAuthcontroller extends Controller

{
    public function CustomAdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.states.index')
                ->with('success','You have Successfully loggedin');
        }
        else {
            return redirect()->route("LoginAdmin")->with('error','Oppes! You have entered invalid credentials');
        }

    }

    public function CustomLogout() 
    {
        Session::flush();
        
        Auth::logout();

        return redirect()->route('LoginAdmin');
    }

    public function adminEditAccount() 
    {
        $name = Auth::user()->name;
        $profile_pic = Auth::user()->profile_pic;
      
    
       
        return view('admin.adminedit',compact('name','profile_pic'));
    }

public function updateprofile(Request $request)
{

#Validation
$request->validate([
'old_password' => 'required',
//'new_password' => 'required|confirmed',
]);
$id = auth()->user()->id;
$user = User::find($id);
#Match The Old Password
if (!Hash::check($request->old_password,$user->password)) {
return redirect()->route('admin.AdminEditAccount')->with('error','Account not found');
}
$oldname = $request->name;
//$oldimage = auth()->user()->profile_pic;
//$oldpassword = auth()->user()->password;
if ($request->new_profilepic != '') {
$oldimage = time() . '.' . request()->new_profilepic->getClientOriginalExtension();
request()->new_profilepic->move(public_path('images/users/'), $oldimage);
$oldimage = $oldimage;
}


#Update the new Password
// User::whereId(auth()->user()->id)->update([
// 'password' => ($oldpassword),
// 'profile_pic' => $oldimage,
// 'name' => $oldname
// ]);
$id = auth()->user()->id;
$user = User::find($id);
if($request->new_password){
//$user->password = Hash::make($request->new_password);
}
if($request->new_profilepic){
    $user->profile_pic = $oldimage;
}

$user->name = $oldname;
$user->save();

return redirect()->route('admin.AdminEditAccount')->with('success','Account updated');
}
}
