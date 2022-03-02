<?php

declare(strict_types=1);

namespace App\GraphQl\Resolver\Type\Product;

use App\Repository\Collmex\Type\Product\ProductRepository;
use App\Repository\Collmex\Type\Product\ProductRepositoryInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ProductRawResolver implements ResolverInterface, AliasedInterface
{
    private ProductRepositoryInterface $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $clientId
     * @param string $product_id
     * @return array
     * @throws \MarcusJaschen\Collmex\Client\Exception\RequestFailedException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException
     * @throws \MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException
     */
    public function fetchProduct(int $clientId, string $product_id): array
    {
        return $this->productRepository->getProductRaw($clientId, $product_id);
    }

    /**
     * @return string[]
     */
    public static function getAliases(): array
    {
        return [
            'fetchProduct' => 'ProductRaw'
        ];
    }
}