<?php

declare(strict_types=1);

namespace App\GraphQl\Resolver\Type\Sales;

use App\Repository\Collmex\ApiClient\Type\Sales\Delivery\DeliveryRequestFactoryInterface;
use App\Repository\Collmex\Type\Sales\DeliveryRepositoryInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class DeliveryResolver implements ResolverInterface, AliasedInterface, DeliveryRawResolverInterface
{
    private DeliveryRepositoryInterface $deliveryRepository;

    private DeliveryRequestFactoryInterface $deliveryRequestFactory;

    /**
     * @param DeliveryRepositoryInterface $deliveryRepository
     * @param DeliveryRequestFactoryInterface $deliveryRequestFactory
     */
    public function __construct(
        DeliveryRepositoryInterface $deliveryRepository,
        DeliveryRequestFactoryInterface $deliveryRequestFactory
    ) {
        $this->deliveryRepository = $deliveryRepository;
        $this->deliveryRequestFactory = $deliveryRequestFactory;
    }

    /**
     * @inheritDoc
     */
    public function fetchDelivery(int $clientId, int $deliveryId): array
    {
        $deliveryRequest = $this->deliveryRequestFactory->createDeliveryRequest($clientId);

        $deliveryRequest->setDeliveryId($deliveryId);

        return $this->deliveryRepository->getDelivery($deliveryRequest);
    }

    /**
     * @return string[]
     */
    public static function getAliases(): array
    {
        return [
            'fetchDelivery' => 'Delivery'
        ];
    }
}