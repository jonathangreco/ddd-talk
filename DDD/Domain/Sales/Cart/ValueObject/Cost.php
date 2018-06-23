<?php
/**
 * @author Jonathan Greco <jonathan@superextralab.com>
 * date 23/06/2018
 */
declare(strict_types=1);


class Cost
{
    private $amount;

    /**
     * Cost constructor.
     * @param $amount
     * @throws \Exception
     */
    public static function cost($amount)
    {
        $cost = new self();

        $cost->valid($amount);
        $cost->amount = $amount;
        
        return $cost->amount;
    }

    /**
     * Cart can't be < 0
     * @param $cost
     * @throws \Exception
     */
    private function valid($cost)
    {
        Assertion::min($cost, 0);
    }
}