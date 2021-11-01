<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repository\OrderDetailRepositoryInterface;
use App\Repository\OrderRepositoryInterface;
use App\Repository\UserNotificationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    private  $orderRepository;
    private  $orderDtlRepository;
    private  $userNotificationRepository;

    public function __construct(OrderRepositoryInterface $orderRepository,OrderDetailRepositoryInterface $orderDtlRepository,UserNotificationRepositoryInterface $userNotificationRepository)
    {
        $this->orderRepository=$orderRepository;
        $this->orderDtlRepository=$orderDtlRepository;
        $this->userNotificationRepository=$userNotificationRepository;
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

        //Create Notification

        $notification_data=array();
        $notification_data['notification_to_user_id']=1;
        $notification_data['notification_body']="A order has been placed order num# ".$order->order_no;

        if($order){
            $order_dtl= $this->orderDtlRepository->placeOrderDtl($request,$order->id);
            $admin_notification= $this->userNotificationRepository->createNotification($notification_data,'WEB');
        }
        //Order created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Order created successfully',
            'data' => $order
        ], Response::HTTP_OK);

    }
}
