<?php

declare(strict_types=1);

namespace App\Application\Actions\Product;

use Psr\Http\Message\ResponseInterface as Response;

class ViewProductAction extends ProductAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $productId = (int) $this->resolveArg('id');
        $product = $this->productRepository->findProductOfId($productId);

        $this->logger->info("Ürün bilgisi görüntülendi. ID: {$productId}");

        return $this->respondWithData($product);
    }
}
