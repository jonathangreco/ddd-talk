<?php
/**
 * @author Jonathan Greco <jonathan@superextralab.com>
 * date 23/06/2018
 */
declare(strict_types=1);


class SaleController extends FrameworkController
{
    public function __construct(
        SaleService $saleService,
        ShippingService $shippingService
    ) {
        $this->saleService = $saleService;
        $this->shippingService = $shippingService;
    }

    public function addCartAction(Request $request)
    {
        $customer = $this->saleService->retrieveCustomer($request->get('id'));
        $cart = $this->saleService->addCart($request->get('product'));

        return new Response('view.cart.html', ["cart" => $cart]);
    }
}