<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use Auth;
use Cart;
use Toastr;
use App\User;
use App\Http\Requests\editInformationRequest;

class AccountController extends Controller
{
        public function getBills()
        {
            $user = User::find(Auth::user()->id);
            $bills = $user ->bill() ->paginate(10);
            return view('account.list-bills', compact('bills'));
        }

        public function getBillDetail($id)
        {
            $billdetails = BillDetail::where('bill_id', $id)->get();
            return view('account.list-billdetail', compact('billdetails', 'id'));
        }

        public function cancelBills($id)
        {
            $data = Bill::find($id);
            $data ->bill_detail()->delete();
            $data->delete();
            return redirect('account/orderlists');
        }

        public function getInfo()
        {
            $info = Auth::user();
            return view('account.info', compact('info'));
        }

        public function postInfo(request $rq, editInformationRequest $request)
        {
            $edituser = Auth::user();
            $edituser->name = $rq->input('name');
            $edituser->address = $rq->input('address');
            $edituser->phone_number = $rq->input('phone');
            $edituser->gender = $rq->input('gender');
            $edituser->save();
            Toastr::success('Thay đổi thông tin thành công', $title = null, $options = []);
            return redirect()->back();
        }

        public function getPass()
        {
            return view('account.change-password');
        }

        public function postPass(request $rq)
        {
            $this->validate($rq,
                [
                    'password' => 'required|string|min:6',
                    'repassword' => 'required|same:password',
                ],
                [
                    'password.required' => 'Vui lòng nhập mật khẩu mới',
                    'repassword.required' => 'Vui lòng nhập mật khẩu xác nhận',
                    'repassword.same' => 'Mật khẩu không giống nhau',
                    'password.min' => 'Mật khẩu có ít nhất 6 kí tự'
                ]);
            $pass = Auth::user();
            $pass ->password = bcrypt($rq ->input('password'));
            $pass->save();
            Toastr::success('Bạn đã đổi mật khẩu thành công', $title = null, $options = []);
            return redirect('/');
        }
}
