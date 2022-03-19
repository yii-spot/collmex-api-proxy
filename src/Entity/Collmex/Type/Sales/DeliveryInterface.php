<?php

namespace App\Entity\Collmex\Type\Sales;

use App\Repository\Collmex\Type\TypeIdentifier;

interface DeliveryInterface
{
    public const TYPE_IDENTIFIER = TypeIdentifier::CMXDLV;

    public const KEY_DELIVERY_ID = 'delivery_id';

    public const KEY_KIND_OF_DELIVERY = 'kind_of_delivery';

    public const KEY_CLIENT = 'client';

    public const KEY_CUSTOMER_ID = 'customer_id';

    public const KEY_ORDER_ID = 'order_id';

    public const KEY_CUSTOMER_SALUTATION = 'customer_salutation';

    public const KEY_CUSTOMER_TITLE = 'customer_title';

    public const KEY_CUSTOMER_FIRSTNAME = 'customer_firstname';

    public const KEY_CUSTOMER_LASTNAME = 'customer_lastname';

    public const KEY_CUSTOMER_COMPANY = 'customer_company';

    public const KEY_CUSTOMER_DEPARTMENT = 'customer_department';

    public const KEY_CUSTOMER_STREET = 'customer_street';

    public const KEY_CUSTOMER_ZIP = 'customer_zip';

    public const KEY_CUSTOMER_CITY = 'customer_city';

    public const KEY_CUSTOMER_COUNTRY = 'customer_country';

    public const KEY_CUSTOMER_TEL = 'customer_tel';

    public const KEY_CUSTOMER_TEL2 = 'customer_tel2';

    public const KEY_CUSTOMER_TELEFAX = 'customer_telefax';

    public const KEY_CUSTOMER_EMAIL = 'customer_email';

    public const KEY_CUSTOMER_ACCOUNT_NUMBER = 'customer_account_number';

    public const KEY_CUSTOMER_BANK_ROUTING_NUMBER = 'customer_bank_routing_number';

    public const KEY_CUSTOMER_DIFFERENT_DIPOSITOR = 'customer_different_dipositor';

    public const KEY_CUSTOMER_IBAN = 'customer_IBAN';

    public const KEY_CUSTOMER_BIC = 'customer_BIC';

    public const KEY_CUSTOMER_BANK = 'customer_bank';

    public const KEY_CUSTOMER_BUSINESS_TAX_ID = 'customer_business_tax_id';

    public const KEY_CUSTOMER_PRIVATE_PERSON = 'customer_private_person';

    public const KEY_ORDER_ID_AT_CUSTOMER = 'order_id_at_customer';

    public const KEY_DELIVERY_DATE = 'delivery_date';

    public const KEY_DELIVERY_NOTE = 'delivery_note';

    public const KEY_CLOSING_NOTE = 'closing_note';

    public const KEY_INTERNAL_NOTE = 'internal_note';

    public const KEY_DELETED = 'deleted';

    public const KEY_COMPLETED = 'completed';

    public const KEY_STATUS = 'status';

    public const KEY_LANG = 'lang';

    public const KEY_ISSUER_ID = 'issuer_id';

    public const KEY_WEIGHT = 'weight';

    public const KEY_AMOUNT_TO_BE_COLLECTED = 'amount_to_be_collected';

    public const KEY_CURRENCY = 'currency';

    public const KEY_TRACKING_CODE = 'tracking_code';

    public const KEY_MODE_OF_SHIPMENT = 'mode_of_shipment';

    public const KEY_DELIVERY_SPECIFICATIONS = 'delivery_specifications';

    public const KEY_DELIVERY_ADDITIONS = 'delivery_additions';

    public const KEY_DELIVERY_ADDRESS_SALUTATION = 'delivery_address_salutation';

    public const KEY_DELIVERY_ADDRESS_TITLE = 'delivery_address_title';

    public const KEY_DELIVERY_ADDRESS_FIRSTNAME = 'delivery_address_firstname';

    public const KEY_DELIVERY_ADDRESS_LASTNAME = 'delivery_address_lastname';

    public const KEY_DELIVERY_ADDRESS_COMPANY = 'delivery_address_company';

    public const KEY_DELIVERY_ADDRESS_DEPARTMENT = 'delivery_address_department';

    public const KEY_DELIVERY_ADDRESS_STREET = 'delivery_address_street';

    public const KEY_DELIVERY_ADDRESS_ZIP = 'delivery_address_zip';

    public const KEY_DIRECT_DELIVERY = 'delivery_address_city';

    public const KEY_DELIVERY_ADDRESS_COUNTRY = 'delivery_address_country';

    public const KEY_DELIVERY_ADDRESS_TEL = 'delivery_address_tel';

    public const KEY_DELIVERY_ADDRESS_TEL2 = 'delivery_address_tel2';

    public const KEY_DELIVERY_ADDRESS_TELEFAX = 'delivery_address_telefax';

    public const KEY_DELIVERY_ADDRESS_EMAIL = 'delivery_address_email';

    public const KEY_HANDOVER_REQUIRED = 'handover_required';

    public const KEY_LAST_HANDOVER = 'last_handover';

    public const KEY_DELIVERY_ITEMS = 'delivery_items';
}