<?php


namespace App\Repository;


use App\Models\Order_detail;
use App\Repository\Eloquent\BaseRepository;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    /**
     * OrderDetailRepository constructor.
     *
     * @param Order_detail $model
     */
    public function __construct(Order_detail $model)
    {
        parent::__construct($model);
    }

    public function placeOrderDtl($request=[],$id)
    {
        //Request is valid, create new order

        $order_summary=array();
        $items=$request->all();
        $order_summary['total_amount']=$items['price']*$items['qty'];
        $order_summary['total_vat']=$items['vat_amount']*$items['qty'];

        $order_dtl= $this->model->create([
            'order_id' => $id,
            'product_id' => $items['product_id'],
            'price' => $items['price'],
            'qty' =>$items['qty'],
            'total_vat' => $order_summary['total_vat'],
            'total_amount' => $order_summary['total_amount'],
            'created_by' => $items['user_id'],
        ]);
        return $order_dtl;

    }

}
