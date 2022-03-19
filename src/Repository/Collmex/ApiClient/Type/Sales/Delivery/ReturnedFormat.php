<?php

namespace App\Repository\Collmex\ApiClient\Type\Sales\Delivery;

enum ReturnedFormat: int
{
    case CSV = 0;

    case ZIP = 1;
}