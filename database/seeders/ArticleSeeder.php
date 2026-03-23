<?php
/**
 * Copyright (c) Since 2024 InnoShop - All Rights Reserved
 *
 * @link       https://www.innoshop.com
 * @author     InnoShop <team@innoshop.com>
 * @license    https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

namespace Database\Seeders;

use InnoShop\Common\Models\Article;

class ArticleSeeder extends BaseSeeder
{
    public function run(): void
    {
        $items = $this->getArticles();
        if ($items) {
            $this->safeTruncate(Article::class);
            foreach ($items as $item) {
                Article::query()->create($item);
            }
        }

        $items = $this->getArticleTranslations();
        if ($items) {
            $this->safeTruncate(Article\Translation::class);
            foreach ($items as $item) {
                Article\Translation::query()->create($item);
            }
        }

        $items = $this->getArticleTags();
        if ($items) {
            $this->safeTruncate(Article\Tag::class);
            foreach ($items as $item) {
                Article\Tag::query()->create($item);
            }
        }
    }

    private function getArticles(): array
    {
        return [
            [
                'id'         => 1,
                'catalog_id' => 1,
                'slug'       => 'the-art-of-effortless-dressing',
                'position'   => 1,
                'viewed'     => 48,
                'author'     => 'Sofia Laurent',
                'active'     => 1,
            ],
            [
                'id'         => 2,
                'catalog_id' => 1,
                'slug'       => 'building-a-timeless-capsule-wardrobe',
                'position'   => 2,
                'viewed'     => 35,
                'author'     => 'James Alderton',
                'active'     => 1,
            ],
            [
                'id'         => 3,
                'catalog_id' => 2,
                'slug'       => 'sustainable-fashion-style-with-a-conscience',
                'position'   => 3,
                'viewed'     => 29,
                'author'     => 'Amara Osei',
                'active'     => 1,
            ],
            [
                'id'         => 4,
                'catalog_id' => 2,
                'slug'       => 'the-power-of-accessories',
                'position'   => 4,
                'viewed'     => 22,
                'author'     => 'Sofia Laurent',
                'active'     => 1,
            ],
        ];
    }

    private function getArticleTranslations(): array
    {
        return [
            // Article 1 — en
            [
                'article_id'       => 1,
                'locale'           => 'en',
                'title'            => 'The Art of Effortless Dressing',
                'summary'          => 'True style is not about having more — it is about knowing how to put it all together with confidence and ease.',
                'image'            => 'images/demo/news/1.jpg',
                'content'          => '<p>Great style begins with a clear eye and an edited wardrobe. The most effortlessly dressed people share one secret: they invest in fewer, better pieces and wear them with absolute conviction.</p>
<p>Start with a neutral foundation — a perfectly cut white shirt, tailored trousers in a rich fabric, and a coat that makes you stand taller the moment you put it on. From there, every outfit becomes a conversation between pieces that already know each other well.</p>
<p>Colour matters less than proportion. A monochromatic look in any shade reads as intentional and sophisticated. Texture, however, is everything — the weight of a cashmere knit against raw silk, or a structured blazer over a fluid slip dress, creates the kind of visual interest that trends can never manufacture.</p>
<p>Dress with intention, not for occasion. The woman who wears her best coat to the market on a Tuesday morning understands something fundamental about style: it is a daily practice, not a performance.</p>',
                'meta_title'       => 'The Art of Effortless Dressing | Style Guide',
                'meta_description' => 'Discover how the simplest pieces create the most striking looks. A guide to building effortless personal style.',
                'meta_keywords'    => 'effortless style, fashion guide, wardrobe tips, elegant dressing',
            ],

            // Article 2 — en
            [
                'article_id'       => 2,
                'locale'           => 'en',
                'title'            => 'Building a Timeless Capsule Wardrobe',
                'summary'          => 'Thirty pieces that work together seamlessly will always outperform three hundred that do not. Own exactly what you need — nothing more, nothing less.',
                'image'            => 'images/demo/news/2.jpg',
                'content'          => '<p>The capsule wardrobe concept was pioneered in the 1970s, but its principles have never been more relevant. In an era of fast fashion and endless trend cycles, choosing to invest in a small, cohesive collection of quality garments is a quiet act of rebellion — and impeccable taste.</p>
<p><strong>The Foundation Pieces</strong></p>
<ul>
<li>A white cotton shirt, perfectly fitted at the shoulder</li>
<li>Tailored trousers in charcoal or navy wool</li>
<li>A cashmere or merino crew-neck knit in camel or ivory</li>
<li>A structured blazer that transitions from boardroom to dinner</li>
<li>Dark indigo denim with a clean, straight cut</li>
<li>A midi dress in a fluid, neutral fabric</li>
<li>A long overcoat in a neutral tone — your single greatest investment</li>
</ul>
<p><strong>The Rule of Three</strong></p>
<p>Every piece you add should work with at least three others already in your wardrobe. If it does not pass this test, it does not belong. This simple discipline transforms a collection of clothes into a true wardrobe.</p>
<p>Buy the best quality you can afford in the pieces you wear most. The cost-per-wear of a well-made cashmere sweater worn two hundred times far exceeds the value of ten fast-fashion alternatives.</p>',
                'meta_title'       => 'Building a Timeless Capsule Wardrobe | Fashion Guide',
                'meta_description' => 'Learn how to build a capsule wardrobe with pieces that work together seamlessly for effortless, elegant dressing every day.',
                'meta_keywords'    => 'capsule wardrobe, timeless fashion, wardrobe essentials, classic style',
            ],

            // Article 3 — en
            [
                'article_id'       => 3,
                'locale'           => 'en',
                'title'            => 'Sustainable Fashion: Style with a Conscience',
                'summary'          => 'Mindful choices in what we wear can reduce environmental impact without compromising on elegance, quality, or personal expression.',
                'image'            => 'images/demo/news/3.jpg',
                'content'          => '<p>The most sustainable garment is the one you already own. This single principle, if taken seriously, has the power to transform not only your wardrobe but your entire relationship with clothes.</p>
<p>Sustainable fashion is not about wearing sackcloth. It is about slowing down, choosing better, and caring more deeply about the origin of what touches your skin every day. The finest sustainable brands combine rigorous environmental standards with the kind of craftsmanship that produces garments worthy of being handed down.</p>
<p><strong>How to Shop More Consciously</strong></p>
<p>Ask yourself three questions before any purchase: Do I need this? Will I wear it at least thirty times? Do I know how it was made? If you cannot answer yes to all three, leave it on the rail.</p>
<p>Seek out natural fibres — organic cotton, linen, wool, and silk — that biodegrade at end of life. Avoid blended synthetic fabrics that shed microplastics with every wash. And when synthetic is unavoidable, wash cold, wash rarely, and use a microfibre filter bag.</p>
<p>Second-hand is not a compromise. The most discerning dressers in the world shop vintage and archive pieces — not from necessity, but because the quality and character of older garments is simply unmatched by anything produced today.</p>',
                'meta_title'       => 'Sustainable Fashion: Style with a Conscience',
                'meta_description' => 'Explore how mindful choices reduce environmental impact without compromising on elegance, quality, or personal expression.',
                'meta_keywords'    => 'sustainable fashion, eco fashion, conscious style, ethical clothing',
            ],

            // Article 4 — en
            [
                'article_id'       => 4,
                'locale'           => 'en',
                'title'            => 'The Power of Accessories',
                'summary'          => 'From sculptural jewellery to a perfectly chosen bag, accessories are where personality enters the picture and style becomes unmistakably your own.',
                'image'            => 'images/demo/news/4.jpg',
                'content'          => '<p>Coco Chanel famously advised removing one accessory before leaving the house. The advice endures because restraint in accessories signals confidence — the understanding that less, worn with precision, speaks louder than more.</p>
<p>Yet the right accessory can elevate the most understated outfit to something genuinely memorable. The art lies in knowing which one.</p>
<p><strong>The Classics Worth Investing In</strong></p>
<p><em>The Structured Bag.</em> A single well-made leather bag in a neutral tone — black, tan, or deep burgundy — will serve you for decades. Avoid logos in favour of form: a clean silhouette ages infinitely better than any emblem.</p>
<p><em>The Watch.</em> In an era of smartphones, a watch is a purely aesthetic choice — which makes it the most honest signal of taste. Choose one that suits your wrist, not the moment.</p>
<p><em>Fine Jewellery.</em> A thin gold chain, small hoop earrings, or a single bold ring worn alone — these are the accessories that become part of your identity rather than decoration. Buy fewer pieces of genuine quality and wear them daily.</p>
<p><em>The Silk Scarf.</em> Worn at the neck, tied to a bag handle, or folded into a breast pocket, the silk scarf is the single most versatile accessory in existence. Find one with a pattern that moves you and wear it without explanation.</p>',
                'meta_title'       => 'The Power of Accessories | Style Guide',
                'meta_description' => 'Discover how the right accessories transform any outfit. A guide to investing in jewellery, bags, and the timeless silk scarf.',
                'meta_keywords'    => 'accessories, fashion jewellery, luxury bags, silk scarf, style guide',
            ],
        ];
    }

    private function getArticleTags(): array
    {
        return [
            ['id' => 1, 'article_id' => 1, 'tag_id' => 1],
            ['id' => 2, 'article_id' => 1, 'tag_id' => 2],
            ['id' => 3, 'article_id' => 2, 'tag_id' => 1],
            ['id' => 4, 'article_id' => 3, 'tag_id' => 2],
        ];
    }
}
