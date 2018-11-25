<?php

namespace App\Http\Controllers\Api\V1;

use App\Shipment;
use App\Http\Requests\api\v1\Shipments;

class ShipmentsController extends AbstractJson
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Shipments $request)
    {
        $pagination = $request->get('per', 4);
        $shipments = Shipment::filter($request->all())
            ->sort($request->get('sort'), $request->get('direction'))
            ->with('products')
            ->simplePaginate($pagination);
        $shipments->map(function($shipment) {
            $shipment->products->map(function($item) {
                $item->quantity = $item->pivot->quantity;
            });
        });
        return (parent::response($shipments->all()));
    }
}
