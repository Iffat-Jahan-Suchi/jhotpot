<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerDashboard extends Controller
{
    private $customer;
    private $orders;
    public function index()
    {
        $this->orders=Order::where('customer_id',Session::get('customer_id'))->orderBy('id','desc')->get();
        return view('customer.auth.dashboard',['orders'=>$this->orders]);
    }

    public function changePassword()
    {
        return view('customer.auth.change-password');
    }


    public function customerUpdatePassword(Request $request)
    {
            $this->customer = Customer::find(Session::get('customer_id'));
            if (password_verify($request->oldPassword,$this->customer->password)) {
                if ($request->password == $request->confirm_password) {
                    $this->customer->password = bcrypt($request->password);
                    $this->customer->save();
                    return redirect()->back()->with('message', 'Password update successfully.');
                } else {
                    return redirect()->back()->with('message', 'Sorry.. password & confirm password are not same.');
                }
            }
            else {
                return redirect()->back()->with('message', 'Your Old Password is invalid');
            }

    }

}
