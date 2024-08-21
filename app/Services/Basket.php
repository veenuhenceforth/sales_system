<?php

namespace App\Services;

use App\Models\Product;

class Basket
{
    protected $products = [];
    protected $offers = [];
    protected $deliveryCharges = [];

    public function __construct($deliveryCharges, $offers = [])
    {
        $this->deliveryCharges = $deliveryCharges;
        $this->offers = $offers;
    }

    public function add($productCode)
    {
        $product = Product::where('code', $productCode)->first();
        if ($product) {
            if (!isset($this->products[$productCode])) {
                $this->products[$productCode] = [
                    'product' => $product,
                    'quantity' => 0
                ];
            }
            $this->products[$productCode]['quantity'] += 1;
        }
    }

    public function total()
    {
        $total = 0;
        $productCounts = [];

        foreach ($this->products as $productCode => $item) {
            $product = $item['product'];
            $quantity = $item['quantity'];
            $total += $product->price * $quantity;
            $productCounts[$productCode] = $quantity;
        }

        foreach ($this->offers as $offer) {
            $total -= $offer->apply($productCounts);
        }

        $deliveryCharge = $this->getDeliveryCharge($total);
        return $total + $deliveryCharge;
    }

    protected function getDeliveryCharge($total)
    {
        foreach ($this->deliveryCharges as $threshold => $charge) {
            if ($total < $threshold) {
                return $charge;
            }
        }
        return 0; // Free delivery for orders above the highest threshold
    }

    public function getProducts()
    {
        return $this->products;
    }
}
