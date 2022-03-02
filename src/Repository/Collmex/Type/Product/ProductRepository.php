<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Type\Product;

use App\Repository\Collmex\ApiClient\ApiClientInterface;
use App\Repository\Collmex\Type\Customer\PriceGroupRepositoryInterface;
use App\Repository\Collmex\Type\Purchase\SupplierRepositoryInterface;
use App\Repository\Collmex\Type\System\ClientRepositoryInterface;
use App\Repository\Collmex\Type\System\CostingTypeRepositoryInterface;
use App\Repository\Collmex\Type\System\ProcurementTypeRepositoryInterface;
use App\Repository\Collmex\Type\System\ShippingGroupRepositoryInterface;
use App\Repository\Collmex\Type\System\TaxRateRepositoryInterface;
use MarcusJaschen\Collmex\Request;
use MarcusJaschen\Collmex\Type\ProductGet;

class ProductRepository implements ProductRepositoryInterface
{
    private ApiClientInterface $apiClient;

    private ProductGroupRepositoryInterface $productGroupRepository;

    private ClientRepositoryInterface $clientRepository;

    private TaxRateRepositoryInterface $taxRateRepository;

    private PriceGroupRepositoryInterface $priceGroupRepository;

    private ProductTypeRepositoryInterface $productTypeRepository;

    private ShippingGroupRepositoryInterface $shippingGroupRepository;

    private ProcurementTypeRepositoryInterface $procurementTypeRepository;

    private CostingTypeRepositoryInterface $costingTypeRepository;

    private SupplierRepositoryInterface $supplierRepository;

    /**
     * @param ApiClientInterface $apiClient
     * @param ProductGroupRepository $productGroupRepository
     * @param ClientRepositoryInterface $clientRepository
     * @param TaxRateRepositoryInterface $taxRateRepository
     * @param PriceGroupRepositoryInterface $priceGroupRepository
     * @param ProductTypeRepositoryInterface $productTypeRepository
     * @param ShippingGroupRepositoryInterface $shippingGroupRepository
     * @param ProcurementTypeRepositoryInterface $procurementTypeRepository
     * @param CostingTypeRepositoryInterface $costingTypeRepository
     * @param SupplierRepositoryInterface $supplierRepository
     */
    public function __construct(
        ApiClientInterface $apiClient,
        ProductGroupRepositoryInterface $productGroupRepository,
        ClientRepositoryInterface $clientRepository,
        TaxRateRepositoryInterface $taxRateRepository,
        PriceGroupRepositoryInterface $priceGroupRepository,
        ProductTypeRepositoryInterface $productTypeRepository,
        ShippingGroupRepositoryInterface $shippingGroupRepository,
        ProcurementTypeRepositoryInterface $procurementTypeRepository,
        CostingTypeRepositoryInterface $costingTypeRepository,
        SupplierRepositoryInterface $supplierRepository
    ) {
        $this->apiClient = $apiClient;
        $this->productGroupRepository = $productGroupRepository;
        $this->clientRepository = $clientRepository;
        $this->taxRateRepository = $taxRateRepository;
        $this->priceGroupRepository = $priceGroupRepository;
        $this->productTypeRepository = $productTypeRepository;
        $this->shippingGroupRepository = $shippingGroupRepository;
        $this->procurementTypeRepository = $procurementTypeRepository;
        $this->costingTypeRepository = $costingTypeRepository;
        $this->supplierRepository = $supplierRepository;
    }

    /**
     * @inheritDoc
     */
    public function getProductRaw(int $clientId, string $productId): array
    {
        $collmexRequest = new Request($this->apiClient->getCollmexApiClient());

        $getProductType = new ProductGet([
            self::KEY_CLIENT_ID => $clientId,
            self::KEY_PRODUCT_ID => $productId
        ]);

        $collmexResponse = $collmexRequest->send($getProductType->getCsv());

        $records = $collmexResponse->getRecords();

        if (count($records) >= 1) {
            $record = array_values($records)[0];
            return $record->getData();
        }

        return [];
    }

    /**
     * @inheritDoc
     */
    public function getProduct(int $clientId, string $productId): array
    {
        $result = $this->getProductRaw($clientId, $productId);

        $result[self::KEY_PRODUCT_RAW_DATA] = $result;

        $result[self::KEY_PRODUCT_DESCRIPTION_ENG] = empty($result[self::KEY_PRODUCT_DESCRIPTION_ENG]) ? null : $result[self::KEY_PRODUCT_DESCRIPTION_ENG];

        $result[self::KEY_PRODUCT_GROUP] = $this->productGroupRepository->extractFromRawValue($result[self::KEY_PRODUCT_GROUP]);

        $result[self::KEY_CLIENT] = $this->clientRepository->extractFromRawValue($result[self::KEY_CLIENT_ID]);

        $result[self::KEY_TAX_RATE] = $this->taxRateRepository->extractFromRawValue($result[self::KEY_TAX_RATE]);

        $result[self::KEY_WEIGHT] = (float)str_replace(',', '.', $result[self::KEY_WEIGHT]);

        $result[self::KEY_PRICE_QUANTITY] = (float)str_replace(',', '.', $result[self::KEY_PRICE_QUANTITY]);

        $result[self::KEY_PRODUCT_TYPE] = $this->productTypeRepository->extractFromRawValue($result[self::KEY_PRODUCT_TYPE]);

        $result[self::KEY_INACTIVE] = (bool)$result[self::KEY_INACTIVE];

        $result[self::KEY_PRICE_GROUP] = $this->priceGroupRepository->extractFromRawValue($result[self::KEY_PRICE_GROUP]);

        $result[self::KEY_PRICE] = (float)str_replace(',', '.', $result[self::KEY_PRICE]);

        $result[self::KEY_MANUFACTURER] = empty($result[self::KEY_MANUFACTURER]) ? null : $result[self::KEY_MANUFACTURER];

        $result[self::KEY_SHIPPING_GROUP] = $this->shippingGroupRepository->extractFromRawValue($result[self::KEY_SHIPPING_GROUP]);

        $result[self::KEY_MINIMUM_QUANTITY] = (float)str_replace(',', '.', $result[self::KEY_MINIMUM_QUANTITY]);

        $result[self::KEY_QUANTITY] = (float)str_replace(',', '.', $result[self::KEY_QUANTITY]);

        $result[self::KEY_LOT_MANDATORY] = (bool)$result[self::KEY_LOT_MANDATORY];

        $result[self::KEY_PROCUREMENT_TYPE] = $this->procurementTypeRepository->extractFromRawValue($result[self::KEY_PROCUREMENT]);

        $result[self::KEY_PRODUCTION_TIME] = empty($result[self::KEY_PRODUCTION_TIME]) ? null : $result[self::KEY_PRODUCTION_TIME];

        $result[self::KEY_LABOR_COSTS] = (float)str_replace(',', '.', $result[self::KEY_LABOR_COSTS]);

        $result[self::KEY_LABOR_COSTS_REFERENCING_AMOUNT] = (float)str_replace(',', '.', $result[self::KEY_LABOR_COSTS_REFERENCING_AMOUNT]);

        $result[self::KEY_ANNOTATION] = empty($result[self::KEY_ANNOTATION]) ? null : $result[self::KEY_ANNOTATION];

        $result[self::KEY_COSTING_TYPE] = $this->costingTypeRepository->extractFromRawValue($result[self::KEY_COSTING]);

        $result[self::KEY_COSTS] = (float)str_replace(',', '.', $result[self::KEY_COSTS]);

        $result[self::KEY_REFERENCE_AMOUNT_COST] = (float)str_replace(',', '.', $result[self::KEY_REFERENCE_AMOUNT_COST]);

        $result[self::KEY_SUPPLIER] = $this->supplierRepository->extractFromRawValue($result[self::KEY_PURCHASE_SUPPLIER]);

        $result[self::KEY_PURCHASE_TAX_RATE] = $this->taxRateRepository->extractFromRawValue($result[self::KEY_PURCHASE_TAX_RATE]);

        $result[self::KEY_PURCHASE_DESCRIPTION] = empty($result[self::KEY_PURCHASE_DESCRIPTION]) ? null : $result[self::KEY_PURCHASE_DESCRIPTION];

        $result[self::KEY_PURCHASE_QUANTITY_PER_PACKAGE] = (float)str_replace(',', '.', $result[self::KEY_PURCHASE_QUANTITY_PER_PACKAGE]);

        $result[self::KEY_PURCHASE_PRICE] = (float)str_replace(',', '.', $result[self::KEY_PURCHASE_PRICE]);

        $result[self::KEY_WEBSITE_ID] = empty($result[self::KEY_WEBSITE_ID]) ? null : $result[self::KEY_WEBSITE_ID];

        $result[self::KEY_SHOP_SHORT_TEXT] = empty($result[self::KEY_SHOP_SHORT_TEXT]) ? null : $result[self::KEY_SHOP_SHORT_TEXT];

        $result[self::KEY_SHOP_LONG_TEXT] = empty($result[self::KEY_SHOP_LONG_TEXT]) ? null : $result[self::KEY_SHOP_LONG_TEXT];

        $result[self::KEY_TEXT_TYPE] = empty($result[self::KEY_TEXT_TYPE]) ? null : $result[self::KEY_TEXT_TYPE];

        $result[self::KEY_FILENAME] = empty($result[self::KEY_FILENAME]) ? null : $result[self::KEY_FILENAME];

        $result[self::KEY_KEYWORDS] = empty($result[self::KEY_KEYWORDS]) ? null : $result[self::KEY_KEYWORDS];

        $result[self::KEY_TITLE] = empty($result[self::KEY_TITLE]) ? null : $result[self::KEY_TITLE];

        $result[self::KEY_TEMPLATE_ID] = empty($result[self::KEY_TEMPLATE_ID]) ? null : $result[self::KEY_TEMPLATE_ID];

        $result[self::KEY_IMAGE_URL] = empty($result[self::KEY_IMAGE_URL]) ? null : $result[self::KEY_IMAGE_URL];

        $result[self::KEY_BASE_PRICE_QUANTITY_PRODUCT] = empty($result[self::KEY_BASE_PRICE_QUANTITY_PRODUCT]) ? null : $result[self::KEY_BASE_PRICE_QUANTITY_PRODUCT];

        $result[self::KEY_BASE_PRICE_QUANTITY_BASE_UNIT] = empty($result[self::KEY_BASE_PRICE_QUANTITY_BASE_UNIT]) ? null : $result[self::KEY_BASE_PRICE_QUANTITY_BASE_UNIT];

        $result[self::KEY_BASE_UNIT] = empty($result[self::KEY_BASE_UNIT]) ? null : $result[self::KEY_BASE_UNIT];

        $result[self::KEY_REQUESTED_PRICE] = empty($result[self::KEY_REQUESTED_PRICE]) ? null : $result[self::KEY_REQUESTED_PRICE];

        $result[self::KEY_INACTIVE_ALT] = (bool)$result[self::KEY_INACTIVE_ALT];

        $result[self::KEY_SHOP_CATEGORY_IDS] = empty($result[self::KEY_SHOP_CATEGORY_IDS]) ? null : $result[self::KEY_SHOP_CATEGORY_IDS];

        $result[self::KEY_PRODUCT_NUMBER_MANUFACTURER] = empty($result[self::KEY_PRODUCT_NUMBER_MANUFACTURER]) ? null : $result[self::KEY_PRODUCT_NUMBER_MANUFACTURER];

        $result[self::KEY_DELIVERY_RELEVANT] = (bool)$result[self::KEY_DELIVERY_RELEVANT];

        $result[self::KEY_AMAZON_ASIN] = empty($result[self::KEY_AMAZON_ASIN]) ? null : $result[self::KEY_AMAZON_ASIN];

        $result[self::KEY_EBAY_ITEM_NUMBER] = empty($result[self::KEY_EBAY_ITEM_NUMBER]) ? null : $result[self::KEY_EBAY_ITEM_NUMBER];

        $result[self::KEY_DIRECT_DELIVERY] = (bool)$result[self::KEY_DIRECT_DELIVERY];

        $result[self::KEY_HS_CODE] = empty($result[self::KEY_HS_CODE]) ? null : $result[self::KEY_HS_CODE];

        $result[self::KEY_STORAGE_BIN] = empty($result[self::KEY_STORAGE_BIN]) ? null : $result[self::KEY_STORAGE_BIN];

        return $result;
    }
}