<?php

namespace Paylike\Endpoint;

/**
 * Class Endpoint
 *
 * @package Paylike\Endpoint
 */
abstract class Endpoint
{
    /**
     * @var \Paylike\Paylike
     */
    protected $paylike;

    /**
     * Endpoint constructor.
     *
     * @param $paylike
     */
    public function __construct($paylike)
    {
        $this->paylike = $paylike;
    }
}
