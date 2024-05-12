<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function updateUser(Request $request)
    {
        $user = User::find($request->updateId);
        if(!empty($request->current_password )){
            if(!empty($request->password && $request->confirmpassword)){
                if(Hash::check($request->current_password, $user->password)){
                    $newpassword = Hash::make($request->password);
                    // toastr()->success("Your Password updated successfully");

                 } else{
                     toastr()->error("Your Current password does not match our records");
                     return redirect()->back();
                 }
            }  else {
                toastr()->error("Your  password does not match our records");
                return redirect()->back();
            }
        }
        // $imgpath = public_path('images/profile/');
        // if (empty($request->avatar)) {
        //     $updateimage = $user->avatar ?? '';
        // } else {
        //     $imagePath =  $imgpath . $user->avatar;
        //     if (File::exists($imagePath)) {
        //         File::delete($imagePath);
        //     }
        //     $destinationPath = $imgpath;
        //     $file = $request->avatar;
        //     $fileName = time() . '.' . $file->clientExtension();
        //     $file->move($destinationPath, $fileName);
        //     $updateimage = $fileName;
        // }
        try {
            $user->update([
                'name'          => $request->name ?? '', 
                'description'         => $request->description ?? '',
                'address'         => $request->address ?? '',
                // 'avatar' => $updateimage ?? '',
                'avatar' => $request->thumbnail ?? '',
                'password'      => (!empty($newpassword)) ? $newpassword : $user->password,
            ]);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        toastr()->success('Profile Updated Successfully"');
        return redirect()->back();
    }
    public function addAdminUser(Request $request)
    {
        try {
            $user = User::create([
                'name'          => $request->name ?? '', 
                'email'         => $request->email ?? '',
                'address'         => $request->address ?? '',
                'phone_no' => $request->phone_no ?? '',
                'avatar' => $request->thumbnail ?? '',
                'password' => Hash::make($request->email),
            ]);

            $user->assignRole($request->role);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        toastr()->success('Profile Updated Successfully"');
        return redirect()->back();
    }

    public function adminUserEdit(Request $request)
    {
        $user = User::find($request->id);

       return view('pages.apps.user-management.users.edit', compact(['user']));
    }

    public function updateAdminUser(Request $request)
    {
        try {
            $user = User::find($request->updatedId);
            $user->update([
                'name'          => $request->name ?? '', 
                'email'         => $request->email ?? '',
                'phone_no' => $request->phone_no ?? '',
                'address' => $request->address ?? '',
                'avatar' => $request->thumbnail ?? '',
            ]);

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        toastr()->success('Profile Updated Successfully"');
        return redirect()->back();
    }
}
