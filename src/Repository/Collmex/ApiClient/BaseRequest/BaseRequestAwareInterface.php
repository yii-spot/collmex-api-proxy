<?php

namespace App\Repository\Collmex\ApiClient\BaseRequest;

interface BaseRequestAwareInterface
{
    /**
     * @return BaseRequestInterface|null
     */
    public function getBaseRequest(): ?BaseRequestInterface;
}