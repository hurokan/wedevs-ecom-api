<?php


namespace App\Repository;

use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function searchProduct($request=[]);
}
