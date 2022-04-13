<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function show(User $user){
        return view('admin.users.profile', ['user'=>$user, 'roles'=>Role::all()]);
    }

    public function update(User $user){
        $profile_data = request()->validate([
            'username'=>['required', 'string', 'max:255', 'alpha_dash'],
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'email', 'max:255'],
            'avatar'=>['file'],
            'stafftype'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
            'valid'=>['file'],
            'usertype'=>['string']
        ]);



        if (request('avatar')) {
            $profile_data['avatar'] = request('avatar')->store('images');
        }

        if (request('valid')) {
            $profile_data['valid'] = request('valid')->store('images');
        }

        $user->update($profile_data);

        Session::flash('userUpdated', 'User was updated successfully');

        /*if ($user->userHasRole('admin')) {
            return redirect()->route('users.index');
        }
        else {*/
            return back();
        //}
    }

    public function remove(User $user){
        //$this->authorize('delete', $post);

        $user->delete();

        Session::flash('messageDeleted', 'User was deleted successfully');

        return redirect()->route('users.index');
    }

    public function index($user_type){
        $role = Role::find(1);
        //dd($user_type);
        if ($user_type == "all") {
            $users = auth()->user()->paginate(10);
        } elseif($user_type == "unapproved"){
            $users = User::where('approved', 0)->get();
        } elseif ($user_type == "admins") {
            $users = User::where('usertype', 'Admin')->get();
        } elseif ($user_type == "clients") {
            $users = User::where('usertype', 'Client')->get();
        } elseif ($user_type == "staffs") {
            $users = User::where('usertype', 'Event Staff')->where('approved', '1')->get();
        }  elseif ($user_type == "eorgs") {
            $users = User::where('stafftype', 'LIKE', '%'. 'Event Organizer' .'%')->where('approved', '1')->get();
        }  elseif ($user_type == "hosts") {
            $users = User::where('stafftype', 'LIKE', '%'. 'Host' .'%')->where('approved', '1')->get();
        }  elseif ($user_type == "eplace") {
            $users = User::where('stafftype', 'LIKE', '%'. 'Event Place' .'%')->where('approved', '1')->get();
        }  elseif ($user_type == "foods") {
            $users = User::where('stafftype', 'LIKE', '%'. 'Foods' .'%')->where('approved', '1')->get();
        }  elseif ($user_type == "entertainers") {
            $users = User::where('stafftype', 'LIKE', '%'. 'Entertainer' .'%')->where('approved', '1')->get();
        }  elseif ($user_type == "lands") {
            $users = User::where('stafftype', 'LIKE', '%'. 'Light and Sounds' .'%')->where('approved', '1')->get();
        }  elseif ($user_type == "iands") {
            $users = User::where('stafftype', 'LIKE', '%'. 'Invitation and Stationary' .'%')->where('approved', '1')->get();
        }  elseif ($user_type == "vandp") {
            $users = User::where('stafftype', 'LIKE', '%'. 'Video and Photography' .'%')->where('approved', '1')->get();
        }  elseif ($user_type == "decors") {
            $users = User::where('stafftype', 'LIKE', '%'. 'Decorations' .'%')->where('approved', '1')->get();
        }

        return view('admin.users.index', ['users'=>$users]);
    }

    public function location(User $user){
        return view('admin.users.location', ['user'=>$user]);
    }

    public function approve(User $user){
        $user->update(['approved'=>1]);

        Session::flash('userApproved', 'User approved successfully');

        return back();
    }
}
