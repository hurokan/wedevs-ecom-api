<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repository\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function searchProduct(Request $request)
    {

        $product = $this->productRepository->searchProduct($request->all());

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product not found.'
            ], 400);
        }

        return $product;
    }

}
