<?php


namespace App\Repository;


use App\Models\Product;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\UserRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * ProductRepository constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function searchProduct($request=[])
    {
       return Product::all()->sortBy('name');
    }

}
