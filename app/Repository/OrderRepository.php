<?php


namespace App\Repository;


use App\Models\Order;
use App\Repository\Eloquent\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * OrderRepository constructor.
     *
     * @param Order $model
     */
    public function __construct(Order $model)
    {
        parent::__construct($model);
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
            'order_no' => 'WEDEV'.date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT),
            'total_amount' => $order_summary['total_amount'],
            'total_qty' => $items['qty'],
            'total_vat' => $order_summary['total_vat'],
            'net_amount' =>$order_summary['net_amount'],
            'shipping_address' => $items['shipping_address'],
            'contact_no' => $items['contact_no'],
            'shipping_method' =>'COD',
            'created_by' =>$items['user_id']
        ]);
        return $order;

    }

}
