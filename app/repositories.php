<?php

declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Domain\Product\ProductRepository;
use App\Domain\Category\CategoryRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use App\Infrastructure\Persistence\Product\InMemoryProductRepository;
use App\Infrastructure\Persistence\Category\InMemoryCategoryRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our Repository interfaces to their in memory implementations
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        ProductRepository::class => \DI\autowire(InMemoryProductRepository::class),
        CategoryRepository::class => \DI\autowire(InMemoryCategoryRepository::class),
    ]);
};
