<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use Illuminate\Http\Request;

class AdminOrdersEditController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id, Order $order, Request $request)
    {
        if ($request->isMethod('post')) {
            // обработка чекбоксов /admin/orders
            if (isset($_POST['delUser']) and isset($_POST['item'])) {
                foreach ($_POST['item'] as $item) {
                    $delItem = Order::find($item);
                    $delItem->delete();
                }
                return redirect()->back();
            }


        }
    }
}
