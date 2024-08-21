<?php
namespace App\Services;

class Offer
{
    protected $productCode;
    protected $discount;
    protected $quantityRequired;

    public function __construct($productCode, $quantityRequired, $discount)
    {
        $this->productCode = $productCode;
        $this->quantityRequired = $quantityRequired;
        $this->discount = $discount;
    }

    public function apply($productCounts)
    {
        if (isset($productCounts[$this->productCode])) {
            $discountsToApply = intdiv($productCounts[$this->productCode], $this->quantityRequired);
            return $discountsToApply * $this->discount;
        }
        return 0;
    }
}
