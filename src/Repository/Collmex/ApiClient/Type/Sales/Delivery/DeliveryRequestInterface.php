<?php

namespace App\Repository\Collmex\ApiClient\Type\Sales\Delivery;

use App\Repository\Collmex\ApiClient\BaseRequest\BaseRequestAwareInterface;
use App\Repository\Collmex\ApiClient\BaseRequest\BaseRequestInterface;
use App\Repository\Collmex\ApiClient\BaseRequest\RequestTypeIdentifier;

interface DeliveryRequestInterface extends BaseRequestInterface, BaseRequestAwareInterface
{
    public const TYPE_IDENTIFIER = RequestTypeIdentifier::DELIVERY_GET;

    public const KEY_DELIVERY_ID = 'delivery_id';

    public const KEY_CUSTOMER_ID = 'customer_id';

    public const KEY_DELIVERY_DATE_FROM = 'delivery_date_from';

    public const KEY_DELIVERY_DATE_TO = 'delivery_date_to';

    public const KEY_ISSUED_ONLY = 'issued_only';

    public const KEY_RETURNED_FORMAT = 'returned_format';

    public const KEY_CHANGED_ONLY = 'changed_only';

    public const KEY_SYSTEM_NAME = 'system_name';

    public const KEY_NO_WRITING_PAPER = 'no_writing_paper';

    public const KEY_ORDER_ID = 'order_id';

    public const KEY_SHIPMENT_TYPE = 'shipment_type';

    public const KEY_MARK_AS_ISSUED = 'mark_as_issued';

    /**
     * @return int|null
     */
    public function getDeliveryId(): ?int;

    /**
     * @param int|null $deliveryId
     * @return DeliveryRequestInterface
     */
    public function setDeliveryId(?int $deliveryId): DeliveryRequestInterface;
}