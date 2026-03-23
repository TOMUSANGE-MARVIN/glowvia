<?php
/**
 * Copyright (c) Since 2024 InnoShop - All Rights Reserved
 *
 * @link       https://www.innoshop.com
 * @author     InnoShop <team@innoshop.com>
 * @license    https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

namespace Database\Seeders;

use InnoShop\Common\Models\Product;
use InnoShop\Common\Repositories\ProductRepo;

class ProductSeeder extends BaseSeeder
{
    /**
     * @throws \Exception|\Throwable
     */
    public function run(): void
    {
        $items = $this->getProducts();
        if ($items) {
            $this->safeTruncate(Product\Translation::class);
            $this->safeTruncate(Product\Category::class);
            $this->safeTruncate(Product\Sku::class);
            $this->safeTruncate(Product::class);
            foreach ($items as $item) {
                ProductRepo::getInstance()->create($item);
            }
        }
    }

    private function getProducts(): array
    {
        return ;
    }
}
