<?php

namespace App\Repository\Collmex\Type\Product;

interface ProductRepositoryInterface
{
    public const KEY_PRODUCT_RAW_DATA = 'product_raw_data';

    public const KEY_PRODUCT_ID = 'product_id';

    public const KEY_PRODUCT_DESCRIPTION_ENG = 'product_description_eng';

    public const KEY_PRODUCT_GROUP = 'product_group';

    public const KEY_CLIENT = 'client';

    public const KEY_CLIENT_ID = 'client_id';

    public const KEY_TAX_RATE = 'tax_rate';

    public const KEY_TAX_RATE_ID = 'tax_rate_id';

    public const KEY_WEIGHT = 'weight';

    public const KEY_PRICE_QUANTITY = 'price_quantity';

    public const KEY_PRODUCT_TYPE = 'product_type';

    public const KEY_INACTIVE = 'inactive';

    public const KEY_PRICE_GROUP = 'price_group';

    public const KEY_PRICE = 'price';

    public const KEY_MANUFACTURER = 'manufacturer';

    public const KEY_SHIPPING_GROUP = 'shipping_group';

    public const KEY_MINIMUM_QUANTITY = 'minimum_quantity';

    public const KEY_QUANTITY = 'quantity';

    public const KEY_LOT_MANDATORY = 'lot_mandatory';

    public const KEY_PROCUREMENT = 'procurement';

    public const KEY_PROCUREMENT_TYPE = 'procurement_type';

    public const KEY_PRODUCTION_TIME = 'production_time';

    public const KEY_LABOR_COSTS = 'labor_costs';

    public const KEY_LABOR_COSTS_REFERENCING_AMOUNT = 'labor_costs_reference_amount';

    public const KEY_ANNOTATION = 'annotation';

    public const KEY_COSTING = 'costing';

    public const KEY_COSTING_TYPE = 'costing_type';

    public const KEY_COSTS = 'costs';

    public const KEY_REFERENCE_AMOUNT_COST = 'reference_amount_cost';

    public const KEY_PURCHASE_SUPPLIER = 'purchase_supplier';

    public const KEY_SUPPLIER = 'supplier';

    public const KEY_PURCHASE_TAX_RATE = 'purchase_tax_rate';

    public const KEY_PURCHASE_DESCRIPTION = 'purchase_description';

    public const KEY_PURCHASE_QUANTITY_PER_PACKAGE = 'purchase_quantity_per_package';

    public const KEY_PURCHASE_PRICE = 'purchase_price';

    public const KEY_WEBSITE_ID = 'website_id';

    public const KEY_SHOP_SHORT_TEXT = 'shop_short_text';

    public const KEY_SHOP_LONG_TEXT = 'shop_long_text';

    public const KEY_TEXT_TYPE = 'text_type';

    public const KEY_FILENAME = 'filename';

    public const KEY_KEYWORDS = 'keywords';

    public const KEY_TITLE = 'title';

    public const KEY_TEMPLATE_ID = 'template_id';

    public const KEY_IMAGE_URL = 'image_url';

    public const KEY_BASE_PRICE_QUANTITY_PRODUCT = 'base_price_quantity_product';

    public const KEY_BASE_PRICE_QUANTITY_BASE_UNIT = 'base_price_quantity_base_unit';

    public const KEY_BASE_UNIT = 'base_unit';

    public const KEY_REQUESTED_PRICE = 'requested_price';

    public const KEY_INACTIVE_ALT = 'inactive_alt';

    public const KEY_SHOP_CATEGORY_IDS = 'shop_category_ids';

    public const KEY_PRODUCT_NUMBER_MANUFACTURER = 'product_number_manufacturer';

    public const KEY_DELIVERY_RELEVANT = 'delivery_relevant';

    public const KEY_AMAZON_ASIN = 'amazon_asin';

    public const KEY_EBAY_ITEM_NUMBER = 'ebay_item_number';

    public const KEY_DIRECT_DELIVERY = 'direct_delivery';

    public const KEY_HS_CODE = 'hs_code';

    public const KEY_STORAGE_BIN = 'storage_bin';


    /**
     * @param int $clientId
     * @param string $productId
     * @return array
     * @throws \MarcusJaschen\Collmex\Client\Exception\RequestFailedException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException
     */
    public function getProductRaw(int $clientId, string $productId): array;

    /**
     * @param int $clientId
     * @param string $productId
     * @return array
     * @throws \MarcusJaschen\Collmex\Client\Exception\RequestFailedException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException
     */
    public function getProduct(int $clientId, string $productId): array;
}