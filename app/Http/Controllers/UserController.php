<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;
    private $users;
    private $emailUser;
    public function index()
    {
        return view('admin.user.add-user');
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email',

        ]);
        $this->user =new User();
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = $request->password;
        $this->user->save();

        return redirect('add-user')->with('message','User create Successfully');
    }
    public function manage()
    {
        $this->users=User::all();
        return view('admin.user.manage',['users'=>$this->users]);
    }
    public function edit($id)
    {
        $this->user=User::find($id);
        return view('admin.user.edit',['user'=>$this->user]);
    }
    public function update(Request $request,$id)
    {
        $this->user=User::find($id);
        $this->emailUser =User::where('email',$request->email)->first();
        if($this->emailUser) {
            if ($this->user->id != $this->emailUser->id) {
                return redirect()->back()->with('message', 'Sorry email address already exists,Try to different one');
            }
        }

            $this->user->name =$request->name;
            $this->user->email=$request->email;

        if(password_verify($request->password,$this->user->password))

        {
            $this->user->password=bcrypt($request->password);
        }
        else
        {
            return redirect()->back()->with('message','Your old password is wrong');
        }
        $this->user->save();
        return redirect('manage-user')->with('message','User Info Update Successfully');

    }
    public function delete($id)
    {
        $this->user=User::find($id);
        $this->user->delete();
        return redirect('manage-user')->with('message','User Delete Successfully');
    }


}
