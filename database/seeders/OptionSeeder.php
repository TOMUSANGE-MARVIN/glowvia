<?php
/**
 * Copyright (c) Since 2024 InnoShop - All Rights Reserved
 *
 * @link       https://www.innoshop.com
 * @author     InnoShop <team@innoshop.com>
 * @license    https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

namespace Database\Seeders;

use InnoShop\Common\Models\Option;
use InnoShop\Common\Models\OptionValue;

class OptionSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->safeTruncate(OptionValue::class);
        $this->safeTruncate(Option::class);

        $options = $this->getOptions();

        foreach ($options as $index => $opt) {
            $option = Option::query()->create([
                'name'        => $opt['name'],
                'description' => $opt['description'],
                'type'        => $opt['type'],
                'position'    => $index,
                'active'      => true,
                'required'    => $opt['required'] ?? false,
            ]);

            $position = 0;
            foreach ($opt['values'] as $value) {
                OptionValue::query()->create([
                    'option_id' => $option->id,
                    'name'      => $value['name'],
                    'image'     => $value['image'] ?? '',
                    'position'  => $position++,
                    'active'    => true,
                ]);
            }
        }
    }

    private function getOptions(): array
    {
        return [
            [
                'name' => [
                    'en' => 'Gift Wrap',
                ],
                'description' => [
                    'en' => 'Provide standard or premium gift wrapping',
                ],
                'type'     => 'radio',
                'required' => true,
                'values'   => [
                    [
                        'name'  => ['en' => 'Standard Wrap'],
                        'image' => '',
                    ],
                    [
                        'name'  => ['en' => 'Premium Gift Box'],
                        'image' => '',
                    ],
                ],
            ],
            [
                'name' => [
                    'en' => 'Accessories',
                ],
                'description' => [
                    'en' => 'Optional accessories to enhance the product',
                ],
                'type'     => 'checkbox',
                'required' => false,
                'values'   => [
                    [
                        'name'  => ['en' => 'Brooch'],
                        'image' => 'images/demo/product/7.png',
                    ],
                    [
                        'name'  => ['en' => 'Belt'],
                        'image' => 'images/demo/product/8.png',
                    ],
                ],
            ],
            [
                'name' => [
                    'en' => 'Express Customization',
                ],
                'description' => [
                    'en' => 'Choose rush service option',
                ],
                'type'     => 'radio',
                'required' => false,
                'values'   => [
                    [
                        'name'  => ['en' => 'No Rush'],
                        'image' => '',
                    ],
                    [
                        'name'  => ['en' => 'Next-day Shipping'],
                        'image' => '',
                    ],
                ],
            ],
        ];
    }
}
