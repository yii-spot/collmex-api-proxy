<?php

namespace App\Repository\Collmex\ApiClient\BaseRequest;

enum RequestTypeIdentifier: string
{
    case DELIVERY_GET = 'DELIVERY_GET';

    case PRODUCT_GET = 'PRODUCT_GET';
}