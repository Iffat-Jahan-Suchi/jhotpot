<?php

namespace App\Http\Controllers;

use App\Mail\OrderNotificationMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Illuminate\Http\Request;
use Mail;
use Session;


class CheckoutController extends Controller
{
    private $cartItem;
    private $paymentType;
    private $customer;
    private $order;
    private $orderDetail;
    private $payment;
    private $data=[];

    public function index()
    {
        if(Session::get('customer_id'))
        {
            $this->customer=Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer=false;
        }
        return view('front.checkout.checkout',['customer'=>$this->customer]);
    }
    public function newOrder(Request $request)
    {
        if(Session::get('customer_id'))
        {
            $this->customer=Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer=new Customer();
            $this->customer->name=$request->name;
            $this->customer->mobile=$request->mobile;
            $this->customer->email=$request->email;
            $this->customer->password=bcrypt($request->mobile);
            $this->customer->address=$request->delivery_address;
            $this->customer->save();
            Session::put('customer_id',$this->customer->id);
            Session::put('customer_name',$this->customer->name);
        }


        $this->order=new Order();
        $this->order->customer_id       =$this->customer->id;
        $this->order->order_total       =Session::get('order_total');
        $this->order->tax_total         =Session::get('tax_total');
        $this->order->shipping_cost     =Session::get('shipping_cost');
        $this->order->delivery_address  =$request->delivery_address;
        $this->order->order_date        =date('y-m-d');
        $this->order->order_timestamp   =strtotime(date('y-m-d'));
        $this->order->payment_type      =$request->payment_method;
        $this->order->save();

        $this->cartItem=Cart::getContent();
        foreach($this->cartItem as $item)
        {
            $this->orderDetail=new OrderDetail();
            $this->orderDetail->order_id            =$this->order->id;
            $this->orderDetail->prodcut_id          =$item->id;
            $this->orderDetail->prodcut_name        =$item->name;
            $this->orderDetail->prodcut_price       =$item->price;
            $this->orderDetail->prodcut_qty         =$item->quantity;
            $this->orderDetail->save();

            Cart::remove($item->id);
        }
        //emai send

        $this->data=[
            'name'=>$this->customer->name,
            'user'=>$this->customer->email,
            'password'=>$this->customer->mobile,
            'login_link'=>asset('/customer-login'),
            'total'=>$this->order->order_total

        ];
        Mail::to($this->customer->email)->send(new OrderNotificationMail($this->data));

        return redirect('/complete-order');





    }

    public function completeOrder()
    {
        return view('front.order.complete-order');
    }
}
