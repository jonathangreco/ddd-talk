<?php
/**
 * @author Jonathan Greco <jonathan@superextralab.com>
 * date 23/06/2018
 */
declare(strict_types=1);


class ShippingAddress
{
    public $id; //same ID as User or Customer, it's primary key.
    public $street;
    public $nameAdr;
    public $city;
    public $zipCode;
    public $pays;

    public $door;
    public $floor;
    public $contactPhone;
}