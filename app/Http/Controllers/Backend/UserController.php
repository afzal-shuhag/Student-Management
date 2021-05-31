<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function view()
    {
      $data['allData'] = User::where('role','Admin')->get();
      return view('backend.user.view-user',$data);
    }

    public function add()
    {
      return view('backend.user.add-user');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'role_two' => 'required',
        'email' => 'required|unique:users,email',
        'name' => 'required',
        // 'password' => 'confirmed',
      ],
      [
        'email.required' => 'Please Provide an email',
      ]
    );

      $code = rand(0000,9999);
      $data = new User();

      $data->role_two = $request->role_two;
      $data->role = 'Admin';
      $data->name = $request->name;
      $data->email = $request->email;
      $data->password = bcrypt($code);
      $data->code = $code;
      $data->save();

      return redirect()->route('users.view')->with('success_message_top', 'Data inserted Successfully!!');

    }

    public function edit($id)
    {
      $editData = User::find($id);
      return view('backend.user.edit-user',compact('editData'));
    }

    public function update(Request $request,$id)
    {

      $this->validate($request,[
        'role_two' => 'required',
        'email' => 'required',
        'name' => 'required',
      ],
      [
        'email.required' => 'Please Provide an email',
      ]
    );

      $data = User::find($id);

      $data->role_two = $request->role_two;
      $data->name = $request->name;
      $data->email = $request->email;
      $data->save();

      // session()->flash('success', 'Data updated Successfully!!');
      return redirect()->route('users.view')->with('success_message_top', 'Data updated Successfully!!');


    }

    public function delete($id)
    {
      $user = User::find($id);
      if(file_exists('public/upload/user_images' . $user->image) AND !empty($user->image))
      {
        unlink('public/upload/user_images' . $user->image);
      }
      $user->delete();

      return redirect()->route('users.view')->with('success_message_top', 'Data deleted Successfully!!');
    }
}
