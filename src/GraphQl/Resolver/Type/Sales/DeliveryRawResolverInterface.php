<?php

namespace App\GraphQl\Resolver\Type\Sales;

interface DeliveryRawResolverInterface
{
    /**
     * @param int $clientId
     * @param string $deliveryId
     * @return array
     * @throws \MarcusJaschen\Collmex\Client\Exception\RequestFailedException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException
     */
    public function fetchDelivery(int $clientId, int $deliveryId): array;
}