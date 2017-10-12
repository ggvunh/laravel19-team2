<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\editUserRequest;
use Illuminate\Support\Facades\Input;
use Toastr;

class userController extends Controller
{
    public function listUsers()
    {
        $users = User::All();
        return view('admin.product.list-all-users', compact('users'));
    }

    public function getEditUsers($id)
    {
        $user = User::find($id);
        return view('admin.product.edit-user', compact('user'));
    }

    public function postEditUsers($id ,Request $rq, editUserRequest $request )
    {
        $data = User::find($id);
        $name = $rq->input('user-name');
            if ($name != null) $data ->name=$name;
        $data->gender = $rq->input('gender');
        $data->roles = $rq->input('roles');
        $email = $rq->input('email');
            if ($email != null) $data ->email=$email;
        $phone_number = $rq->input('phone_number');
            if ($phone_number != null) $data ->phone_number=$phone_number;
        $data->save();
        Toastr::success('Edit successful user', $title = null, $options = []);
        return redirect('admin/product/listusers');
    }

    public function deleteUsers($id)
    {
        $data = User::find($id);
        $data->delete();
        Toastr::success('Delete successful user', $title = null, $options = []);
        return redirect('admin/product/listusers');
    }

}
