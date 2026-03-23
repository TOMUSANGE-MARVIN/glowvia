<?php
/**
 * Copyright (c) Since 2024 InnoShop - All Rights Reserved
 *
 * @link       https://www.innoshop.com
 * @author     InnoShop <team@innoshop.com>
 * @license    https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

namespace Database\Seeders;

use InnoShop\Common\Models\Setting;
use InnoShop\Common\Repositories\SettingRepo;
use Throwable;

class SettingSeeder extends BaseSeeder
{
    /**
     * @return void
     * @throws Throwable
     */
    public function run(): void
    {
        $items = $this->getSettings();
        if ($items) {
            $this->safeTruncate(Setting::class);
            foreach ($items as $item) {
                SettingRepo::getInstance()->updateSystemValue($item['name'], $item['value']);
            }
        }
    }

    /**
     * @return array[]
     */
    private function getSettings(): array
    {
        return [
            ['space' => 'system', 'name' => 'front_logo', 'value' => 'images/logo.png'],
            ['space' => 'system', 'name' => 'panel_logo', 'value' => 'images/logo-panel.svg'],
            ['space' => 'system', 'name' => 'placeholder', 'value' => 'images/placeholder.png'],
            ['space' => 'system', 'name' => 'favicon', 'value' => 'images/favicon.png'],
            ['space' => 'system', 'name' => 'country_code', 'value' => 'US'],
            ['space' => 'system', 'name' => 'state_code', 'value' => 'CA'],
            ['space' => 'system', 'name' => 'front_locale', 'value' => 'en'],
            ['space' => 'system', 'name' => 'expand', 'value' => '0'],
            ['space' => 'system', 'name' => 'address', 'value' => 'Kampala, Uganda'],
            ['space' => 'system', 'name' => 'telephone', 'value' => '+256 700 000 000'],
            ['space' => 'system', 'name' => 'email', 'value' => 'hello@glowvia.com'],
            ['space' => 'system', 'name' => 'currency', 'value' => 'ugx'],
            ['space' => 'system', 'name' => 'menu_header_categories', 'value' => ['1', '4', '7', '10', '13']],
            ['space' => 'system', 'name' => 'menu_header_pages', 'value' => ['3']],
            ['space' => 'system', 'name' => 'menu_footer_categories', 'value' => ['1', '4', '7']],
            ['space' => 'system', 'name' => 'menu_footer_specials', 'value' => ['products', 'brands']],
            ['space' => 'system', 'name' => 'menu_footer_catalogs', 'value' => ['1', '2']],
            ['space' => 'system', 'name' => 'menu_footer_pages', 'value' => ['1', '2', '3']],
            [
                'space' => 'system',
                'name'  => 'meta_title',
                'value' => [
                    'en' => 'Glowvia — African Luxury Fashion | Handcrafted in Uganda',
                ],
            ],
            [
                'space' => 'system',
                'name'  => 'meta_keywords',
                'value' => [
                    'en' => 'Glowvia, African luxury fashion, Ugandan fashion, handcrafted clothing, bespoke garments, Kampala fashion, African designer, luxury womenswear, African style',
                ],
            ],
            [
                'space' => 'system',
                'name'  => 'meta_description',
                'value' => [
                    'en' => 'Glowvia is a Ugandan luxury fashion house crafting contemporary African clothing for the global stage. Shop handcrafted collections, commission bespoke garments, and experience fashion rooted in African heritage.',
                ],
            ],
            [
                'space' => 'system',
                'name'  => 'slideshow',
                'value' => [
                    [
                        'image' => [
                            'en'    => 'images/demo/banner/banner-1-en.jpg',
                        ],
                        'link' => '/en/category-women-clothing',
                    ],
                    [
                        'image' => [
                            'en'    => 'images/demo/banner/banner-2-en.jpg',
                        ],
                        'link' => '/en/category-women-clothing',
                    ],
                ],
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_article_seo_description',
                'value' => 'Generate an optimised SEO description for this article based on the provided keywords.',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_article_seo_keywords',
                'value' => 'Generate optimised SEO keywords for this article based on the provided keywords.',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_article_seo_title',
                'value' => 'Generate an effective SEO title for this article based on the provided keywords.',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_article_slug',
                'value' => 'Generate a concise, URL-friendly slug for this article based on the provided keywords.',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_article_summary',
                'value' => 'Write a concise and compelling summary for this article based on the provided keywords.',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_selling_point',
                'value' => 'Generate a concise and compelling selling point description for this product. Highlight its core advantages, unique features, and how it stands out from competitors. Use numbered paragraphs for easy reading.',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_seo_description',
                'value' => 'Generate an optimised SEO description for this product. Include key keywords, summarise core features and benefits, and attract potential customers. Keep it between 150-160 characters for full display in search results.',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_seo_keywords',
                'value' => 'Generate optimised SEO keywords for this product. Include primary keywords that summarise the core features and attract potential customers.',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_seo_title',
                'value' => 'Generate an effective SEO title for this product. Include primary keywords, keep it under 60 characters, and make it descriptive and attention-grabbing.',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_slug',
                'value' => 'Generate a concise, URL-friendly slug for this product. Use lowercase letters and hyphens, include the main keywords, and avoid special characters.',
            ],
            [
                'space' => 'system',
                'name'  => 'ai_prompt_product_summary',
                'value' => 'Write a concise and compelling product summary. Highlight core features, key selling points, and unique advantages. Output 1-2 engaging sentences.',
            ],
        ];
    }
}
