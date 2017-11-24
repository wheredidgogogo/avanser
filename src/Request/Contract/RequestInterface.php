<?php
declare(strict_types=1);

namespace Wheredidgogogo\Avanser\Request\Contract;

/**
 * Interface RequestInterface
 *
 * @package Wheredidgogogo\Avanser\Request\Contract
 */
interface RequestInterface
{
    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return array
     */
    public function getParameters();
}