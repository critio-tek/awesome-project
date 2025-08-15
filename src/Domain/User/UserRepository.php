<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{
    /**
     * @return User[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
    public function findUserOfId(int $id): User;

    /**
     * Kullanıcı adına göre arama yapar
     * @param string $username
     * @return User[]
     */
    public function searchByUsername(string $username): array;
}
