<?php
declare(strict_types=1);

namespace Wheredidgogogo\Avanser\Request\ManageServices;

use Wheredidgogogo\Avanser\Request\Contract\RequestInterface;

class ListServices implements RequestInterface
{
    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return 'services';
    }

    /**
     * @return string
     */
    public function getParameters()
    {
        return [];
    }
}
