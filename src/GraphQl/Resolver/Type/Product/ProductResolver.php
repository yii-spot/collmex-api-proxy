<?php

declare(strict_types=1);

namespace App\GraphQl\Resolver\Type\Product;

use App\Repository\Collmex\Type\Product\ProductRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ProductResolver implements ResolverInterface, AliasedInterface
{
    private ProductRepository $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ProductRepository $productRepository
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
        return $this->productRepository->getProduct($clientId, $product_id);
    }

    /**
     * @return string[]
     */
    public static function getAliases(): array
    {
        return [
            'fetchProduct' => 'Product'
        ];
    }
}