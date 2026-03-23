<?php
/**
 * Copyright (c) Since 2024 InnoShop - All Rights Reserved
 *
 * @link       https://www.innoshop.com
 * @author     InnoShop <team@innoshop.com>
 * @license    https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use InnoShop\Common\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $items = $this->getPages();
        if ($items) {
            Page::query()->truncate();
            foreach ($items as $item) {
                Page::query()->create($item);
            }
        }

        $items = $this->getPageTranslations();
        if ($items) {
            Page\Translation::query()->truncate();
            foreach ($items as $item) {
                Page\Translation::query()->create($item);
            }
        }
    }

    /**
     * @return array[]
     */
    private function getPages(): array
    {
        return [
            [
                'id'     => 1,
                'slug'   => 'creations',
                'viewed' => 666,
                'active' => 1,
            ],
            [
                'id'     => 2,
                'slug'   => 'services',
                'viewed' => 888,
                'active' => 1,
            ],
            [
                'id'     => 3,
                'slug'   => 'about',
                'viewed' => 999,
                'active' => 1,
            ],
            [
                'id'     => 4,
                'slug'   => 'privacy-policy',
                'viewed' => 0,
                'active' => 1,
            ],
            [
                'id'     => 5,
                'slug'   => 'contact',
                'viewed' => 0,
                'active' => 1,
            ],
        ];
    }

    /**
     * @return array[]
     */
    private function getPageTranslations(): array
    {
        return [
            
            
            
            [
                'page_id'          => 1,
                'locale'           => 'en',
                'title'            => 'Creations',
                'content'          => '<section class="page-content-section">
  <div class="page-hero-text">
    <p class="page-eyebrow">Our Work</p>
    <h1 class="page-headline">Where Vision Becomes Garment</h1>
    <p class="page-lead">Every piece in the Glowvia collection is a deliberate act of artistry — conceived with intention, cut with precision, and finished by hand.</p>
  </div>

  <div class="page-content-body">
    <h2>The Glowvia Aesthetic</h2>
    <p>At Glowvia, we believe clothing is the first language. Each creation speaks before you do — announcing your presence with quiet confidence and understated luxury. Our design philosophy is rooted in the tension between structure and fluidity, the modern and the timeless.</p>
    <p>From our signature draped silhouettes to our architectural tailoring, every collection is born from months of research, material sourcing, and iterative design. We do not follow trends. We set the conditions for them.</p>

    <h2>Handcrafted in Africa, Worn Worldwide</h2>
    <p>Our atelier is based in Uganda, where a dedicated team of skilled artisans brings each design to life. We are deeply committed to supporting local craftsmanship, investing in the skills of our makers, and ensuring every person in our supply chain is treated with dignity and paid fairly.</p>
    <p>The fabrics we choose are sourced from across the continent and beyond — premium cottons, silk blends, and sustainable textiles that feel as extraordinary as they look.</p>

    <h2>Signature Collections</h2>
    <p><strong>The Luminary Series</strong> — Our flagship line of eveningwear. Fluid, luminous, and designed for the woman who commands every room she enters.</p>
    <p><strong>The Meridian Edit</strong> — Elevated everyday wear. Clean lines, refined cuts, and fabrics that move with you from morning to midnight.</p>
    <p><strong>The Rift Collection</strong> — Bold statement pieces inspired by the dramatic landscapes of East Africa. Rich textures, earthy tones, and unapologetic silhouettes.</p>

    <h2>Bespoke & Made-to-Order</h2>
    <p>For clients who desire something entirely their own, we offer a bespoke service. Work directly with our head designer to create a piece conceived around your body, your story, and your vision. Every bespoke garment begins with a private consultation and ends with something you will wear for a lifetime.</p>
  </div>
</section>',
                'meta_title'       => 'Creations — Glowvia Fashion',
                'meta_description' => 'Explore Glowvia\'s handcrafted fashion collections — from signature eveningwear to bespoke made-to-order garments, designed and crafted in Uganda.',
                'meta_keywords'    => 'Glowvia creations, fashion collections, African luxury fashion, bespoke garments, handcrafted clothing Uganda',
            ],
            [
                'page_id'          => 2,
                'locale'           => 'en',
                'title'            => 'Services',
                'content'          => '<section class="page-content-section">
  <div class="page-hero-text">
    <p class="page-eyebrow">What We Offer</p>
    <h1 class="page-headline">A Complete Fashion Experience</h1>
    <p class="page-lead">From your first purchase to a fully bespoke commission, Glowvia offers a suite of services designed around you.</p>
  </div>

  <div class="page-content-body">
    <h2>Personal Styling</h2>
    <p>Our in-house stylists are available for one-on-one consultations, whether in person at our Kampala showroom or virtually. We help you build a wardrobe that reflects your personality, suits your lifestyle, and makes getting dressed feel effortless. Sessions are available by appointment.</p>

    <h2>Bespoke & Custom Orders</h2>
    <p>Have a vision? We bring it to life. Our bespoke service covers everything from custom wedding and event attire to one-of-a-kind wardrobe pieces. The process begins with a detailed consultation, followed by fabric selection, pattern drafting, fittings, and final delivery. Lead time is typically 4–8 weeks depending on complexity.</p>

    <h2>Alterations & Tailoring</h2>
    <p>We offer professional alterations on all Glowvia garments. Whether you need a hem adjusted, a seam let out, or a full re-cut to better fit your silhouette, our tailors handle every request with care. We also accept alteration requests on select third-party garments — contact us to discuss your needs.</p>

    <h2>Corporate & Bulk Orders</h2>
    <p>Equip your team or event with unified, beautifully designed attire. Glowvia works with businesses, NGOs, and event organisers to create branded or custom-designed uniforms and group outfits. Bulk pricing is available for orders of 10 pieces and above.</p>

    <h2>Gift Cards & Gifting</h2>
    <p>Give the gift of Glowvia. Our digital gift cards are available in any denomination and never expire. Perfect for birthdays, anniversaries, and celebrations of all kinds. We also offer curated gift packaging on all orders upon request.</p>

    <h2>Delivery & Shipping</h2>
    <p>We deliver across Uganda with same-day dispatch on in-stock orders placed before 12 pm. International shipping is available to selected countries across Africa, Europe, and North America. All orders are carefully packaged in our signature Glowvia boxes.</p>

    <h2>Get in Touch</h2>
    <p>To book a consultation, place a custom order, or simply ask a question, reach us at <strong>hello@glowvia.com</strong> or visit our showroom in Kampala. We would love to meet you.</p>
  </div>
</section>',
                'meta_title'       => 'Services — Glowvia Fashion',
                'meta_description' => 'Discover Glowvia\'s full range of fashion services — personal styling, bespoke orders, alterations, corporate attire, and gift cards.',
                'meta_keywords'    => 'Glowvia services, personal styling Uganda, bespoke fashion, custom clothing, alterations Kampala',
            ],
            [
                'page_id'          => 3,
                'locale'           => 'en',
                'title'            => 'About Us',
                'content'          => '<section class="page-content-section">
  <div class="page-hero-text">
    <p class="page-eyebrow">Our Story</p>
    <h1 class="page-headline">Dressing the World in African Luxury</h1>
    <p class="page-lead">Glowvia is a Ugandan luxury fashion house built on the belief that African style deserves a global stage.</p>
  </div>

  <div class="page-content-body">
    <h2>Who We Are</h2>
    <p>Founded in Kampala, Glowvia is more than a fashion brand — it is a movement. We create clothing for the modern African woman and man: confident, global, rooted in culture, and unafraid to stand out. Every piece we produce is a statement of identity, crafted with the skill of our artisans and the vision of our designers.</p>
    <p>We are a brand that refuses to be boxed in. We draw inspiration from the richness of East African heritage — its textiles, its colours, its stories — and we translate that inspiration into contemporary silhouettes that feel at home in Kampala, London, Lagos, or New York.</p>

    <h2>Our Mission</h2>
    <p>To make luxury fashion that is honest, inclusive, and deeply rooted in African craftsmanship. We are committed to producing clothing that lasts — in quality, in style, and in meaning.</p>

    <h2>Our Values</h2>
    <p><strong>Craftsmanship:</strong> We believe in making things properly. Every Glowvia garment is handled by skilled hands and inspected before it leaves our atelier.</p>
    <p><strong>Authenticity:</strong> We do not imitate. Our designs are original, our voice is distinct, and our identity is our own.</p>
    <p><strong>Community:</strong> We employ local artisans, source from local suppliers where possible, and invest in the communities that make our work possible.</p>
    <p><strong>Sustainability:</strong> We produce in limited quantities, use quality materials that endure, and are working toward a fully transparent supply chain.</p>

    <h2>The Team</h2>
    <p>Glowvia was founded by a small team of designers, creatives, and entrepreneurs who shared a frustration: the world\'s fashion industry was not telling Africa\'s story. We decided to change that — one garment at a time.</p>
    <p>Today our team spans design, production, styling, and customer experience. We are a passionate, diverse group united by a love of beautiful clothing and a belief that fashion should feel personal.</p>

    <h2>Find Us</h2>
    <p>Our showroom and atelier are located in Kampala, Uganda. We welcome visitors by appointment. You can also shop our full collection online at glowvia.com, with delivery available across Uganda and internationally.</p>
    <p>For enquiries: <strong>hello@glowvia.com</strong></p>
  </div>
</section>',
                'meta_title'       => 'About Us — Glowvia Fashion',
                'meta_description' => 'Learn about Glowvia — a Ugandan luxury fashion house crafting contemporary African clothing for the global stage.',
                'meta_keywords'    => 'Glowvia, about us, African luxury fashion, Ugandan fashion brand, Kampala fashion',
            ],
            
            [
                'page_id'          => 5,
                'locale'           => 'en',
                'title'            => 'Contact Us',
                'content'          => '',
                'meta_title'       => 'Contact Us — Glowvia Fashion',
                'meta_description' => 'Get in touch with Glowvia. Visit our Kampala showroom, send us a message, or book a consultation.',
                'meta_keywords'    => 'contact Glowvia, Kampala showroom, fashion consultation Uganda',
            ],
            [
                'page_id' => 4,
                'locale'  => 'en',
                'title'   => 'Privacy Policy',
                'content' => '<p>InnoShop takes your privacy seriously. This Privacy Policy explains how we collect, use, and protect your personal information.</p>

<h3>1. Information Collection</h3>
<p>We collect the following information:</p>
<ul>
    <li>Account information: email, username, etc.</li>
    <li>Device information: IP address, browser type, etc.</li>
    <li>Usage data: access records, operation logs, etc.</li>
</ul>

<h3>2. Information Usage</h3>
<p>We use the collected information to:</p>
<ul>
    <li>Provide and improve services</li>
    <li>Send important notifications</li>
    <li>Prevent fraud and abuse</li>
</ul>

<h3>3. Information Protection</h3>
<p>We implement strict security measures to protect your information, including:</p>
<ul>
    <li>Data encryption</li>
    <li>Access control</li>
    <li>Regular security audits</li>
</ul>

<h3>4. Information Sharing</h3>
<p>We do not sell your personal information. We may share information only in the following cases:</p>
<ul>
    <li>With your explicit consent</li>
    <li>When required by law</li>
    <li>To protect our legal rights</li>
</ul>

<h3>5. Your Rights</h3>
<p>You have the right to:</p>
<ul>
    <li>Access your personal information</li>
    <li>Correct inaccurate information</li>
    <li>Request deletion of your information</li>
    <li>Restrict information processing</li>
</ul>

<h3>6. Contact Us</h3>
<p>If you have any questions about our Privacy Policy, please contact us:</p>
<p>Email: privacy@innoshop.com</p>',
                'meta_title'       => 'Privacy Policy - InnoShop',
                'meta_description' => 'InnoShop Privacy Policy',
                'meta_keywords'    => 'Privacy Policy, Data Protection, Personal Information',
            ],
        ];
    }
}
