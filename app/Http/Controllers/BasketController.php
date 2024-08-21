<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Basket;
use App\Services\Offer;

class BasketController extends Controller
{
    protected $basket;

    public function __construct()
    {
        $deliveryCharges = [
            50 => 4.95,
            90 => 2.95,
            PHP_INT_MAX => 0
        ];

        $offers = [
            new Offer('R01', 2, 32.95 / 2)
        ];

        $this->basket = new Basket($deliveryCharges, $offers);
    }

    public function showProducts()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function showBasket()
    {
        $basketHtml = view('basket-items', ['basket' => $this->basket])->render();
        return response()->json([
            'html' => $basketHtml,
            'total' => number_format($this->basket->total(), 2, '.', '')
        ]);
    }

    public function addToBasket(Request $request)
    {
        $quantities = $request->input('quantity', []);

        foreach ($quantities as $productCode => $quantity) {
            $quantity = (int)$quantity;
            for ($i = 0; $i < $quantity; $i++) {
                $this->basket->add($productCode);
            }
        }

        return response()->json([
            'total' => number_format($this->basket->total(), 2, '.', '')
        ]);
    }
}
