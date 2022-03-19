<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\Sales;

use App\Entity\Collmex\Type\Sales\DeliveryInterface;
use App\Entity\Collmex\Type\Sales\DeliveryItemInterface;
use App\Entity\Collmex\Type\Sales\DeliveryRawInterface;
use App\Repository\Collmex\ApiClient\ApiClientInterface;
use App\Repository\Collmex\ApiClient\Type\Sales\Delivery\DeliveryRequestInterface;
use App\Repository\Collmex\Converter\DateTimeConverterInterface;
use App\Repository\Collmex\Type\System\ClientRepositoryInterface;
use MarcusJaschen\Collmex\Request;
use MarcusJaschen\Collmex\Type\DeliveryGet;

class DeliveryRepository implements DeliveryRepositoryInterface
{
    private ApiClientInterface $apiClient;

    private ClientRepositoryInterface $clientRepository;

    private DateTimeConverterInterface $dateTimeConverter;

    /**
     * @param ApiClientInterface $apiClient
     * @param ClientRepositoryInterface $clientRepository
     * @param DateTimeConverterInterface $dateTimeConverter
     */
    public function __construct(
        ApiClientInterface $apiClient,
        ClientRepositoryInterface $clientRepository,
        DateTimeConverterInterface $dateTimeConverter
    ) {
        $this->apiClient = $apiClient;
        $this->clientRepository = $clientRepository;
        $this->dateTimeConverter = $dateTimeConverter;
    }

    /**
     * @inheritDoc
     */
    public function getDeliveryRaw(DeliveryRequestInterface $deliveryRequest): array
    {
        $collmexRequest = new Request($this->apiClient->getCollmexApiClient());

        $getDeliveryType = new DeliveryGet([
            DeliveryRequestInterface::KEY_TYPE_IDENTIFIER => $deliveryRequest->getTypeIdentifier()->value,
            DeliveryRequestInterface::KEY_CLIENT_ID => $deliveryRequest->getClientId(),
            DeliveryRequestInterface::KEY_DELIVERY_ID => $deliveryRequest->getDeliveryId()
        ]);

        $collmexResponse = $collmexRequest->send($getDeliveryType->getCsv());

        $records = $collmexResponse->getRecords();

        $result = [];

        foreach ($records as $record) {
            $data = $record->getData();
            if (
                !isset($data['type_identifier'])
                || DeliveryRawInterface::TYPE_IDENTIFIER->value !== $data['type_identifier']
            ) {
                continue;
            }

            $result[] = $data;
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getDelivery(DeliveryRequestInterface $deliveryRequest): array
    {
        $result = [];

        $deliveryData = $this->getDeliveryRaw( $deliveryRequest);

        if (empty($deliveryData)) {
            return $result;
        }

        $result = $deliveryData[0];

        $this->removePositionDataFromDeliveryData($result);
        $this->updateDeliveryData($result);

        $result[DeliveryInterface::KEY_DELIVERY_ITEMS] = [];
        $this->hydrateDeliveryItems($deliveryData, $result[DeliveryInterface::KEY_DELIVERY_ITEMS]);

        $result[self::KEY_DELIVERY_RAW_DATA] = $deliveryData;

        return $result;
    }

    /**
     * @param array $deliveryData
     */
    private function removePositionDataFromDeliveryData(array &$deliveryData): void
    {
        unset($deliveryData[DeliveryRawInterface::KEY_POSITION]);
        unset($deliveryData[DeliveryRawInterface::KEY_POSITION_TYPE]);
        unset($deliveryData[DeliveryRawInterface::KEY_PRODUCT_ID]);
        unset($deliveryData[DeliveryRawInterface::KEY_PRODUCT_DESCRIPTION]);
        unset($deliveryData[DeliveryRawInterface::KEY_UNIT]);
        unset($deliveryData[DeliveryRawInterface::KEY_QUANTITY]);
        unset($deliveryData[DeliveryRawInterface::KEY_CUSTOMER_ORDER_POSITION]);
        unset($deliveryData[DeliveryRawInterface::KEY_EAN]);
    }

    /**
     * @param array $deliveryData
     */
    private function updateDeliveryData(array &$deliveryData): void
    {
        $deliveryData[DeliveryInterface::KEY_CLIENT] = $this->clientRepository->extractFromRawValue(
            $deliveryData[DeliveryRawInterface::KEY_CLIENT_ID]
        );

        $deliveryData[DeliveryInterface::KEY_CUSTOMER_PRIVATE_PERSON] = (bool)$deliveryData[DeliveryRawInterface::KEY_CUSTOMER_PRIVATE_PERSON];

        $deliveryData[DeliveryInterface::KEY_DELIVERY_DATE] = $this->dateTimeConverter->convertDateString(
            $deliveryData[DeliveryRawInterface::KEY_DELIVERY_DATE]
        );

        $deliveryData[DeliveryInterface::KEY_DELETED] = (bool)$deliveryData[DeliveryRawInterface::KEY_DELETED];
        $deliveryData[DeliveryInterface::KEY_COMPLETED] = (bool)$deliveryData[DeliveryRawInterface::KEY_COMPLETED];

        $deliveryData[DeliveryInterface::KEY_WEIGHT] = (float)str_replace(
            ',',
            '.',
            $deliveryData[DeliveryRawInterface::KEY_WEIGHT]
        );

        $deliveryData[DeliveryInterface::KEY_AMOUNT_TO_BE_COLLECTED] = (float)str_replace(
            ',',
            '.',
            $deliveryData[DeliveryRawInterface::KEY_AMOUNT_TO_BE_COLLECTED]
        );

        $deliveryData[DeliveryInterface::KEY_HANDOVER_REQUIRED] = (bool)$deliveryData[DeliveryRawInterface::KEY_HANDOVER_REQUIRED];
    }

    /**
     * @param array $deliveryData
     * @param array $deliveryItems
     */
    private function hydrateDeliveryItems(array $deliveryData, array &$deliveryItems): void
    {
        foreach ($deliveryData as $positionData) {
            $deliveryItem = [
                DeliveryItemInterface::KEY_POSITION => $positionData[DeliveryRawInterface::KEY_POSITION],
                DeliveryItemInterface::KEY_POSITION_TYPE => $positionData[DeliveryRawInterface::KEY_POSITION_TYPE],
                DeliveryItemInterface::KEY_PRODUCT_ID => $positionData[DeliveryRawInterface::KEY_PRODUCT_ID],
                DeliveryItemInterface::KEY_PRODUCT_DESCRIPTION => $positionData[DeliveryRawInterface::KEY_PRODUCT_DESCRIPTION],
                DeliveryItemInterface::KEY_UNIT => $positionData[DeliveryRawInterface::KEY_UNIT],
                DeliveryItemInterface::KEY_CUSTOMER_ORDER_POSITION => $positionData[DeliveryRawInterface::KEY_CUSTOMER_ORDER_POSITION],
                DeliveryItemInterface::KEY_EAN => $positionData[DeliveryRawInterface::KEY_EAN]
            ];

            $deliveryItem[DeliveryItemInterface::KEY_QUANTITY] = (float)str_replace(
                ',',
                '.',
                $positionData[DeliveryRawInterface::KEY_QUANTITY]
            );

            $deliveryItems[] = $deliveryItem;
        }
    }
}