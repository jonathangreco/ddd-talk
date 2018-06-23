<?php
/**
 * @author Jonathan Greco <jonathan@superextralab.com>
 * date 30/05/2018
 */
declare(strict_types = 1);

use Assert\Assertion;

final class HashedPassword
{
    /**
     * @param string $plainPassword
     * @throws \Assert\AssertionFailedException
     */
    public static function encode(string $plainPassword): self
    {
        $pass = new self();

        $pass->hash($plainPassword);

        return $pass;
    }

    public static function fromHash(string $hashedPassword): self
    {
        $pass = new self;

        $pass->hashedPassword = $hashedPassword;

        return $pass;
    }

    public function match(string $plainPassword): bool
    {
        return password_verify($plainPassword, $this->hashedPassword);
    }

    /**
     * @param string $plainPassword
     * @throws \Assert\AssertionFailedException
     */
    private function hash(string $plainPassword): void
    {
        $this->validate($plainPassword);

        $this->hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT, ['cost' => self::COST]);
    }

    public function toString(): string
    {
        return $this->hashedPassword;
    }

    public function __toString(): string
    {
        return $this->hashedPassword;
    }

    /**
     * @param string $raw
     * @throws \Assert\AssertionFailedException
     */
    private function validate(string $raw): void
    {
        Assertion::minLength($raw, 6, 'Min 6 characters password');
    }

    /**
     * Private Constructor
     * HashedPassword constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param int $length
     * @return string
     */
    public static function generate($length = 20): string
    {
        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
            '0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';

        $str = '';
        $max = strlen($chars) - 1;

        for ($i=0; $i < $length; $i++)
            $str .= $chars[random_int(0, $max)];

        return $str;
    }

    /** @var string */
    private $hashedPassword;

    public const COST = 12;
}