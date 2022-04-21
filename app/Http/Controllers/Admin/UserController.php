<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
   public function edit(){

    $user = Auth::user();
    return view('admin.user.edit', compact('user'));
   }

   public function update(Request $request){

    $user = Auth::user();

    $request->validate([
        'name' => 'required|min:2',
        'email' => 'required|email',
        'image' => 'nullable|mimes:jpg,jpeg,png,bmp|max:2048',
        'new_password' => 'nullable|confirmed|min:8'
    ]);

    $data = $request->all();

    if(isset($data['image'])){
        $avatar_path = Storage::disk('local')->put('avatars', $data['image']);
        $data['avatar'] = $avatar_path; 
     }



    if ($data['new_password']){
        $new_password = Hash::make($data['new_password']);
        $data['password'] = $new_password;
    }

    $user->update($data);

    return redirect()->route('admin.user.edit')->with('message', 'Profilo aggiornato con successo');
   }

   public function getMyAvatar(){
       $user = Auth::user();

       if($user){

           if($user->avatar){
                //return Storage::disk('local')->download($user->avatar); soluzione per un download forzato del file
                return response()->file(storage_path('app') . '/' . $user->avatar); //soluzione per lo stream del file
            }else{
                abort(404);
            }
            
       }else{
           abort(403);
       }
       
   }
}
