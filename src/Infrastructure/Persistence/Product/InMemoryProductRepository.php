<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Product;

use App\Domain\Product\Product;
use App\Domain\Product\ProductNotFoundException;
use App\Domain\Product\ProductRepository;

class InMemoryProductRepository implements ProductRepository
{
    /**
     * @var Product[]
     */
    private array $products;

    /**
     * @param Product[]|null $products
     */
    public function __construct(array $products = null)
    {
        $this->products = $products ?? [
            1 => new Product(1, 'Laptop', 'Yüksek performanslı dizüstü bilgisayar', 15000.00, 1),
            2 => new Product(2, 'Mouse', 'Kablosuz optik fare', 150.00, 1),
            3 => new Product(3, 'Klavye', 'Mekanik gaming klavye', 500.00, 1),
            4 => new Product(4, 'Monitör', '27 inç 4K monitör', 2500.00, 1),
            5 => new Product(5, 'Kulaklık', 'Gürültü önleyici kulaklık', 800.00, 2),
        ];
    }

    /**
     * @return Product[]
     */
    public function findAll(): array
    {
        return array_values($this->products);
    }

    /**
     * @param int $id
     * @return Product
     * @throws ProductNotFoundException
     */
    public function findProductOfId(int $id): Product
    {
        if (!isset($this->products[$id])) {
            throw new ProductNotFoundException();
        }

        return $this->products[$id];
    }
}
