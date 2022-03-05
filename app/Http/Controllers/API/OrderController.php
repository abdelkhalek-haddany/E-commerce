<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\OrderRequest;
use App\Http\Resources\OrdersResource;
use App\Models\Shop\OrderItems;
use App\Models\Shop\Orders;
use App\Models\Shop\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api','admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $orders = Orders::orderBy('created_at', 'desc')->get();

        // $livreur_id = isset($_GET['livreur_id']) ? $_GET['livreur_id'] : null;
        // $confirmation = isset($_GET['confirmation']) ? $_GET['confirmation'] : null;
        // $delivery = isset($_GET['delivery']) ? $_GET['delivery'] : null;
        // $from_date = isset($_GET['from_date']) ? $_GET['from_date'] : null;
        // $to_date = isset($_GET['to_date']) ? $_GET['to_date'] : null;

        // if($livreur_id != null){
        // $order = $orders->where('livreur_id', $livreur_id) ->get();
        // }
        // if($confirmation != null){
        //     $order = $orders->where('confirmation', $confirmation) ->get();
        // }
        // if($delivery != null){
        //     $order = $orders->where('delivery', $delivery) ->get();
        // }
        // if($from_date != null){
        //     $order = $orders->where('created_at'>= $from_date) ->get();
        // }
        // if($to_date != null){
        //     $order = $orders->where('created_at'<= $to_date) ->get();
        // }
        if(count($orders)>0){
        $i=0;
        foreach($orders as $order){
            $OrderItems=DB::select('select id, color , size , quantity , product_id from order_items where order_id = ?', [$order->id]); 
            $j=0;
            $AllOrderItems=[];
            foreach($OrderItems as $orderItem){
                $AllOrderItems[$j] = [
                    'item' => $orderItem,
                    'product' => DB::select('select id, title , price from products where id = ?', [$orderItem->product_id]),
                ];
                $j++;
            }
            $AllOrders[$i] = [
                'order' => $order,
                'items' => $AllOrderItems
            ];
            $i++;
        }
    }
            }catch(Exception $ex){
                return $ex;
            }
        return response([ 'orders' => OrdersResource::collection($AllOrders), 'message' => 'Retrieved successfully'],200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        try {
        $order = Orders::create($request);
        return redirect()->route('orders.index')->with(['success' => 'your order saved successfuly']);

    } catch (\Exception $ex) {
        return $ex;
        return redirect()->route('orders.index')->with(['error' => 'error! please contact us or  try again']);
    }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        return response(['order' => new OrdersResource($order), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $order)
    {
        $order->update($request->all());

        return response(['order' => new OrdersResource($order), 'message' => __('admin/messages.updated')], 200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $order = Orders::find($id);
            if (!$order)
                return response(['error' => __('admin/messages.not_found')], 200);               
            $order->delete();

            return response(['success' => __('admin/messages.deleted')], 200);

        } catch (\Exception $ex) {
            return response(['error' => __('admin/messages.error')], 200);
        }
    }
}