<?php


namespace App\Repository;
use Illuminate\Support\Collection;

interface OrderDetailRepositoryInterface
{
    public function placeOrderDtl($request=[],$id);
}
