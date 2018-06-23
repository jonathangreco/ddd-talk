<?php
/**
 * @author Jonathan Greco <jonathan@superextralab.com>
 * date 23/06/2018
 */
declare(strict_types=1);


class SaleService
{
    /**
     * @param $id
     * @return Customer
     */
    public function retieveCustomer($id)
    {
        $customer = $this->em->execute("SELECT * FROM customer where id = :id")->setParameter(['id' => $id]);
        // SQL Request or Cache
        return $customer;
    }

    public function addCart(Product $product)
    {
        $cart = $this->getCustomerCart();
        $newCost = Cost::cost($cart->getAmount() + $product->getPrice());

        $cart->getProducts()->add($product);
        $cart->setAmount($newCost);

        $this->em->persist()->flush();
    }
}