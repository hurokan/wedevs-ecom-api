<?php


namespace App\Repository;
use Illuminate\Support\Collection;

interface OrderRepositoryInterface
{
    public function placeOrder($request=[]);
}
