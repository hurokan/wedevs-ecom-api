<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repository\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    private  $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository=$orderRepository;
    }

    public function storePlaceOrder(Request $request){

        //Validate data
        $data = $request->only('shipping_address','contact_no','shipping_method');
        $validator = Validator::make($data, [
            'shipping_address' => 'required|string',
            'contact_no' => 'required|string',
            'shipping_method' => 'required|string',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new order
        $order= $this->orderRepository->placeOrder($request);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Order created successfully',
            'data' => $order
        ], Response::HTTP_OK);

    }
}
