<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Mail;
use Session;


class PasswordRecoveryController extends Controller
{
    private $customer;
    private $data=[];
    private $code;
    public function forgetPassword()
    {
        return view('customer.auth.forget-password');
    }

    public function forgetPasswordMailSend(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();
        if($this->customer)
        {
            $this->code = rand(10000, 50000);
            Session::put('code', $this->code);
            Session::put('customer_id', $this->customer->id);
            //=========email send
            $this->data = [
                'id'    => $this->customer->id,
                'name'  => $this->customer->name,
                'code'  => $this->code,
                'link'  => asset('/forget-password-verified-link'),
            ];

            Mail::to($request->email)->send(new ForgetPasswordMail($this->data));
            return redirect('/forget-password-mail-send-view');
        }
        else
        {
            return redirect()->back()->with('message','email id is not valid');
        }
    }

    public function viewMail()
    {
        return view('customer.auth.view-page');
    }
    public function forgetPasswordLink()
    {
        return view('customer.auth.password-recovery-view');
    }
    public function updateForgetPassword(Request $request)
    {
        $this->code = $request->code;

        if ($this->code == Session::get('code'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
            $this->customer->password = bcrypt($request->password);
            $this->customer->save();

            return redirect('/customer-login')->with('message', 'Your password change successfully.');
        }
        else
        {
            return redirect()->back()->with('message', 'Your code is not valid. Please use valid code.');
        }
    }

}
