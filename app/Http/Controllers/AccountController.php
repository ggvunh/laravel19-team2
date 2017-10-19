<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use Auth;
use Cart;
use App\User;
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
}
