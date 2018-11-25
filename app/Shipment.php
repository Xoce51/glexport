<?php

namespace App;

class Shipment extends AbstractModel
{
    /**
     * @var array
     */
    private $filters = ['company_id', 'international_transportation_mode'];

    /**
     * Shipment relation product
     */
    public function products()
    {
        return (
            $this->belongsToMany('App\Product', 'shipment_products')
                ->withPivot('quantity')
        );
    }

    /**
     * Retrieve model filter
     */
    public function getFilters() : array
    {
        return ($this->filters);
    }
}
