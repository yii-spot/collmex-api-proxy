<?php

declare(strict_types=1);

namespace App\Repository\Collmex\ApiClient\Type\Sales\Delivery;

use App\Repository\Collmex\ApiClient\BaseRequest\BaseRequestFactoryInterface;
use App\Repository\Collmex\ApiClient\BaseRequest\BaseRequestInterface;
use App\Repository\Collmex\ApiClient\BaseRequest\RequestTypeIdentifier;
use DateTimeImmutable;

class DeliveryRequest implements DeliveryRequestInterface
{
    private BaseRequestFactoryInterface $baseRequestFactory;

    private ?BaseRequestInterface $baseRequest = null;

    private ?int $deliveryId = null;

    private ?int $customerId = null;

    private ?DateTimeImmutable $deliveryDateFrom = null;

    private ?DateTimeImmutable $deliveryDateTo = null;

    private ?bool $issuedOnly = null;

    private ?ReturnedFormat $returnedFormat = null;

    private ?bool $changedOnly = null;

    private ?string $systemName = null;

    private ?bool $noWritingPaper = null;

    private ?int $orderId = null;

    private ?int $shipmentType = null;

    private ?bool $markAsIssued = null;

    /**
     * @param BaseRequestFactoryInterface $baseRequestFactory
     * @param RequestTypeIdentifier $typeIdentifier
     * @param int $clientId
     */
    public function __construct(
        BaseRequestFactoryInterface $baseRequestFactory,
        RequestTypeIdentifier       $typeIdentifier,
        int                         $clientId
    ) {
        $this->baseRequestFactory = $baseRequestFactory;

        $this->getBaseRequest()->setTypeIdentifier($typeIdentifier);
        $this->getBaseRequest()->setClientId($clientId);
    }

    /**
     * @inheritDoc
     */
    public function getTypeIdentifier(): RequestTypeIdentifier
    {
        return $this->getBaseRequest()->getTypeIdentifier();
    }

    /**
     * @inheritDoc
     */
    public function setTypeIdentifier(RequestTypeIdentifier $typeIdentifier): BaseRequestInterface
    {
        return $this->getBaseRequest()->setTypeIdentifier($typeIdentifier);
    }

    /**
     * @inheritDoc
     */
    public function getClientId(): int
    {
        return $this->getBaseRequest()->getClientId();
    }

    /**
     * @inheritDoc
     */
    public function setClientId(int $clientId): BaseRequestInterface
    {
        return $this->getBaseRequest()->setClientId($clientId);
    }

    /**
     * @inheritDoc
     */
    public function getBaseRequest(): ?BaseRequestInterface
    {
        if (!$this->baseRequest instanceof BaseRequestInterface) {
            $this->baseRequest = $this->baseRequestFactory::createBaseRequest(self::TYPE_IDENTIFIER);
        }

        return $this->baseRequest;
    }

    /**
     * @inheritDoc
     */
    public function getDeliveryId(): ?int
    {
        return $this->deliveryId;
    }

    /**
     * @inheritDoc
     */
    public function setDeliveryId(?int $deliveryId): DeliveryRequestInterface
    {
        $this->deliveryId = $deliveryId;
        return $this;
    }
}