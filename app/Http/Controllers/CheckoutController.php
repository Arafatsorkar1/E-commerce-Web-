<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;
use ShoppingCart;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail;
    public function index(){
        if(Session::get('customer_id')){
            $this->customer = Customer::find(Session::get('customer_id'));
        }else{
            $this->customer = '';
        }

        return view('website.checkout.index',['customer'=>$this->customer]);
    }

    private function orderCustomerValidate($request)
    {
        $request->validate([
            'email' => 'unique:customers,email',
            'mobile' => 'unique:customers,mobile'
        ]);
    }

    public function newCashOrder(Request $request)
    {

        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->orderCustomerValidate($request);
            $this->customer = Customer::newCustomer($request);
            Session::put('customer_id',  $this->customer->id);
            Session::put('customer_name',  $this->customer->name);
        }
       
            $this->order = Order::newOrder($request, $this->customer->id);

            $this->orderDetail = OrderDetail::newOrderDetail($this->order->id); 
            return redirect(route('complete-order'))->with('msg', 'Congratulation! Your order is confirmed Successfully');

    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
