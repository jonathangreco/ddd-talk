<?php
/**
 * @author Jonathan Greco <jonathan@superextralab.com>
 * date 23/06/2018
 */
declare(strict_types=1);


class AccountAddress
{
    public $id; //same ID as User or Customer, it's primary key.
    public $street;
    public $nameAdr;
    public $city;
    public $zipCode;
    public $pays;

    // those are specific to the account.
    public $VATNumber;
    public $siret;
    public $chargeMode; // how the account is charged (Credit card ? Check ?)
}