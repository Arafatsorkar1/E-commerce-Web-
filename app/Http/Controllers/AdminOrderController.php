<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use PDF;

class AdminOrderController extends Controller
{
    private $order;
    public function index()
    {
        return view('admin.order.index', ['orders' => Order::orderBy('id', 'desc')->get()]);
    }

    public function detail($id)
    {
        return view('admin.order.detail', ['order' => Order::find($id)]);
    }

    public function edit($id)
    {
        return view('admin.order.edit', ['order' => Order::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->order = Order::find($id);
        if ($request->order_status == 'Pending') {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
            $this->order->save();
        } elseif ($request->order_status == 'Processing') {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_address  = $request->delivery_address;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
            $this->order->save();
        } elseif ($request->order_status == 'Complete') {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
            $this->order->save();
        } elseif ($request->order_status == 'Cancel') {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
            $this->order->save();
        }
        return redirect(route('admin.all-order'))->with('msg', 'Order Status Info is Updated');
    }

    public function showInvoice($id)
    {
        return view('admin.order.invoice', ['order' => Order::find($id)]);
    }

    public function printInvoice($id)
    {

        $pdf = PDF::loadView('admin.order.print-invoice', ['order' => Order::find($id)]);
        return $pdf->stream($id . '-order.pdf');
    }

    public function delete($id)
    {
        $this->order = Order::find($id);
        if ($this->order->order_status == 'Cancel') {
            Order::deleteOrder($id);
            OrderDetail::deleteOrderDetail($id);
            return back()->with('noti', 'Order is deleted successfully');
        }
        return back()->with('noti', 'Sorry, Order cannot be deleted');
    }
}
