<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Category;

use App\Domain\Category\Category;
use App\Domain\Category\CategoryNotFoundException;
use App\Domain\Category\CategoryRepository;

class InMemoryCategoryRepository implements CategoryRepository
{
    /**
     * @var Category[]
     */
    private array $categories;

    /**
     * @param Category[]|null $categories
     */
    public function __construct(array $categories = null)
    {
        $this->categories = $categories ?? [
            1 => new Category(1, 'Elektronik', 'Bilgisayar, telefon ve diğer elektronik ürünler'),
            2 => new Category(2, 'Ses ve Görüntü', 'Kulaklık, hoparlör ve ses sistemleri'),
            3 => new Category(3, 'Giyim', 'Erkek, kadın ve çocuk giyim ürünleri'),
            4 => new Category(4, 'Kitap', 'Roman, öykü, ders kitabı ve dergiler'),
            5 => new Category(5, 'Ev ve Yaşam', 'Ev dekorasyonu ve yaşam ürünleri'),
        ];
    }

    /**
     * @return Category[]
     */
    public function findAll(): array
    {
        return array_values($this->categories);
    }

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findCategoryOfId(int $id): Category
    {
        if (!isset($this->categories[$id])) {
            throw new CategoryNotFoundException();
        }

        return $this->categories[$id];
    }
}
