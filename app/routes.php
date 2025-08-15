<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\SearchUserAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\Product\ListProductsAction;
use App\Application\Actions\Product\ViewProductAction;
use App\Application\Actions\Category\ListCategoriesAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        return $response->withHeader('Location', '/index.html')->withStatus(302);
    });

    // Kullanıcı endpoint'leri
    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/search', SearchUserAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    // Ürün endpoint'leri
    $app->group('/products', function (Group $group) {
        $group->get('', ListProductsAction::class);
        $group->get('/{id}', ViewProductAction::class);
    });

    // Kategori endpoint'leri  
    $app->group('/categories', function (Group $group) {
        $group->get('', ListCategoriesAction::class);
    });
};
