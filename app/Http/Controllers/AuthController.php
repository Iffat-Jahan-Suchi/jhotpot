<?php

namespace App\Http\Controllers;
use App\Mail\ForgetPasswordMail;
use App\Models\Customer;
use Session;
use Illuminate\Http\Request;
use Mail;

class AuthController extends Controller
{
    private $customer;
    public $data=[];
    private $code;
    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }

    public function login()
    {
        return view('customer.auth.login');
    }

    public function newLogin(Request $request)
    {
        $this->customer=Customer::where('email', $request->email)->first();

        if($this->customer)
        {
            if(password_verify($request->password, $this->customer->password))
            {
                Session::put('customer_id',$this->customer->id);
                Session::put('customer_name',$this->customer->name);
                return redirect('/customer-dashboard');
            }
            else
            {
                return redirect()->back()->with('message','your password is inavid');
            }

        }
        else
        {
            return redirect()->back()->with('message','your email address inavid');
        }


    }
    public function register()
    {
        return view('customer.auth.register');
    }
    public function newRegister(Request $request)
    {
        if($request->password == $request->confirm_password)
        {
            $this->customer=new Customer();
            $this->customer->name       =$request->name;
            $this->customer->email      =$request->email;
            $this->customer->mobile      =$request->mobile;
            $this->customer->password   =bcrypt($request->password);
            $this->customer->save();
            Session::put('customer_id',$this->customer->id);
            Session::put('customer_name',$this->customer->name);
            return redirect('customer-dashboard');

        }
        else
        {
            return redirect()->back()->with('message','Sorry..Your Password and Confirm Pssword is not match');
        }
    }

    public function error()
    {
        return view('errors.404-font');
    }


}
