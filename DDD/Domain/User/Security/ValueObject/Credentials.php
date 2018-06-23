<?php
/**
 * @author Jonathan Greco <jonathan@superextralab.com>
 * date 30/05/2018
 */
declare(strict_types = 1);

/**
 * Credentials are a set of Email/HashedPassword. It's a ValueObject element that is allowed to be passed to the
 * authenticator
 * Class Credentials
 */
class Credentials
{
    /**
     * @var Email
     */
    public $email;

    /**
     * @var HashedPassword
     */
    public $password;

    public function __construct(Email $email, HashedPassword $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}
