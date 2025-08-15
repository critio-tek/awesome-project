<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class SearchUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $queryParams = $this->request->getQueryParams();
        
        if (!isset($queryParams['username']) || empty(trim($queryParams['username']))) {
            return $this->respondWithData([
                'message' => 'Arama yapmak için kullanıcı adı parametresi gereklidir.',
                'users' => []
            ]);
        }
        
        $username = trim($queryParams['username']);
        $users = $this->userRepository->searchByUsername($username);

        $this->logger->info("User search performed with username: {$username}");

        return $this->respondWithData([
            'search_term' => $username,
            'found_count' => count($users),
            'users' => $users
        ]);
    }
}
