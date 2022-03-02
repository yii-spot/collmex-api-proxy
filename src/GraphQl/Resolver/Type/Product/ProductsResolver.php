<?php

declare(strict_types=1);

namespace App\GraphQl\Resolver\Type\Product;

use App\Repository\Collmex\Type\Product\ProductRepositoryInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ProductsResolver implements ResolverInterface, AliasedInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function testResolve(): array
    {
        return [
            [
                'product_id' => '1',
                'product_description' => 'Test name 1'
            ],
            [
                'product_id' => '2',
                'product_description' => 'Test name 2'
            ]
        ];
    }

    public static function getAliases(): array
    {
        return [
            'testResolve' => 'Products'
        ];
    }
}