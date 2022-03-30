<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        // $superAdmin = User::Where('role', '=', 'super')->first();
        // $data['admins'] = User::Where('role', '=', 'admin')->get();

        $data['admins'] = User::Where('role', '=', 'super')->OrWhere('role','=','admin')->get();
        $superAdmin = User::Where('role', '=', 'super')->first();

        // dd($data);
        return view('admin.Admins.index')->with([
            'admins' => $data['admins'],
            'superAdmin' => $superAdmin,
        ]);
    }
    public function editAdmin($adminId)
    {
        $user = User::findOrFail($adminId);
        return view("admin.Admins.edit")->with([
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {   
        $user = User::findOrFail($request->id);
        $request->validate([
            // 'id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'code' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        // dd($user->area);

        if ($request->code == $user->area) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                ]);
                $request->session()->flash("msg", "تم التعديل بنجاح");
        }
        else
        {
            $request->session()->flash("msg", "حدث خطا في التعديل");
            return back();
        }
        // dd($user);
        return redirect(url("dashboard/admins"));
    }

    public function delete(Request $request, $id)
    {
        try
        {   
            $user = User::findOrFail($id);
            $user->delete();
            $msg = "تم الحذف بنجاح";
        }
        catch (Exception $e)
        {   
            $msg = "لا يمكن حذف هذا الحساب";
        }
       $request->session()->flash("msg", $msg);
       return back();
    }
}
