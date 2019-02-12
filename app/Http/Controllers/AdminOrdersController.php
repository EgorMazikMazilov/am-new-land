<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{


    public function index()
    {
        //
        if (view()->exists('admin.orders')) {
            $orders = Order::all();
            $data = [
                'title' => 'Заказы',
                'orders' => $orders
            ];
            return view('admin.orders', $data);
        }


    }
}
