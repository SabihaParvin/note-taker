<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registration()
    {
        return view('pages.registration');
    }

    public function registrationForm(Request $request)
    {
        
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone,
            'password' => bcrypt($request->password),
            'user_type' => 'user'
        ]);

        notify()->success('User Registration Successful.');
        return redirect()->route('login');
    }

    public function login()
    {
        return view('pages.login');
    }
    public function loginform(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $credential = $request->except('_token');
        $login = auth()->attempt($credential);
       
        if ($login) {

           
            return redirect()->route('user.dashboard');
        }

        notify()->error('Invalid credentials');
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
   
    public function profileView()
    {
        return view('pages.users.profile');
    }

    public function editProfile($userId)
    {
        $users = User::find($userId);

        return view('pages.users.profileEdit', compact('users'));
    }

    public function updateProfile(Request $request, $userId)
    {
        

        $users = User::find($userId);

        if ($users) {
            $fileName = $users->image;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('/uploads', $fileName);
            }

            $users->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone,
                'address' => $request->address,
                'image' => $fileName

            ]);

            notify()->success('Profile Updated successfully.');
            return redirect()->route('profile.view');
        }
    }

    public function adminDashboard()
    {
        $users = User::where('user_type', 'user')->count();
        $notes = Note::count();
        return view('pages.admin.dashboard', compact('users', 'notes'));
    }

    public function userList()
    {
        $users = User::where('user_type', 'user')->get();
        return view('pages.admin.userList', compact('users'));
    }

    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        Note::where('user_id', $userId)->delete();
        $user->delete();

        notify()->success('User deleted successfully.');
        return redirect()->back();
    }
}
