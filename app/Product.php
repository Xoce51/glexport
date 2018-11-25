<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * @var array
     */
    protected $appends = ['active_shipment_count'];

    /**
     * Product relation shimpent
     */
    public function shipments() {
        return ($this->belongsToMany('App\Product', 'shipment_products')->withPivot('quantity'));
    }
    
    /**
     * Get shipment count for current product
     */
    public function getActiveShipmentCountAttribute()
    {
        return ($this->belongsToMany('App\Product', 'shipment_products')->count());
    }
}
