<?php


namespace App\Repository;


use App\Models\Order;
use App\Models\Order_detail;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\UserRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Order $model
     * @param Order_detail $detail
     */
    public function __construct(Order $model,Order_detail $detail)
    {
        parent::__construct($model,$detail);
    }

    public function placeOrder($request=[])
    {
        //Request is valid, create new order

        $order_summary=array();
        $items=$request->all();
        $order_summary['total_amount']=$items['price']*$items['qty'];
        $order_summary['total_vat']=$items['vat_amount']*$items['qty'];
        $order_summary['net_amount']=$order_summary['total_amount']+$order_summary['total_vat'];

        $order= $this->model->create([
            'total_amount' => $order_summary['total_amount'],
            'total_qty' => $items['qty'],
            'total_vat' => $order_summary['total_vat'],
            'net_amount' =>$order_summary['net_amount'],
            'shipping_address' => $items['shipping_address'],
            'contact_no' => $items['contact_no'],
            'shipping_method' =>'COD',
            'created_by' =>$items['user_id']
        ]);

    }

}
