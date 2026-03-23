/**
 * Glowvia Scroll Reveal
 * Persistent — animations re-trigger every time an element enters the viewport.
 */

const SELECTORS = [
  // Headings & text blocks
  'h1, h2, h3, h4',
  '.sp-hero-title',
  '.sp-label',
  '.sp-section-title',
  '.sp-body',
  '.sp-eyebrow',
  '.fp-title, .fp-subtitle',
  '.hero-text',
  '.section-title, .section-subtitle',

  // Cards & grid items
  '.product-grid-item',
  '.sp-value-card',
  '.sp-collection-card',
  '.sp-service-card',
  '.sp-stat',
  '.sp-contact-card',
  '.sp-info-row',
  '.sp-contact-info-panel',

  // Images & media
  '.sp-image-placeholder',
  '.sp-image-frame',
  '.image-frame',
  '.banner-item',
  '.module-swiper',

  // Sections & misc
  '.sp-mission-quote',
  '.sp-process-track',
  '.sp-section',
  '.footer-newsletter-inner',
  '.footer-item',
  '.breadcrumb',
  '.page-static-title',

  // Category & product pages
  '.category-item',
  '.filter-group',
  '.sort-bar',
  '.product-detail-main',
  '.product-tab-section',
  '.related-products',

  // Cart / checkout / account
  '.cart-table-wrap',
  '.order-summary-panel',
  '.checkout-section',
  '.account-card',
  '.account-stat',
  '.address-card',

  // News
  '.news-article-card',
  '.news-sidebar-widget',
].join(', ');

// Stagger delay for sibling groups
const STAGGER_PARENTS = [
  '.row',
  '.products-list',
  '.sp-process-track',
  '.footer-top-links .row',
  '.values-grid',
  '.services-grid',
  '.stats-row',
  '.collections-grid',
  '.contact-channels',
];

function assignStaggerDelays(root) {
  STAGGER_PARENTS.forEach(selector => {
    root.querySelectorAll(selector).forEach(parent => {
      Array.from(parent.children).forEach((child, i) => {
        if (child.classList.contains('sr')) {
          child.style.transitionDelay = `${i * 80}ms`;
        }
      });
    });
  });
}

function initScrollReveal() {
  // Mark all matching elements
  document.querySelectorAll(SELECTORS).forEach(el => {
    // Skip elements already inside a hero (they animate via CSS)
    if (el.closest('.hero-fashion, .sp-hero, .auth-split')) return;
    el.classList.add('sr');
  });

  assignStaggerDelays(document);

  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('sr--visible');
        } else {
          // Remove so the animation replays next time
          entry.target.classList.remove('sr--visible');
        }
      });
    },
    {
      threshold: 0.1,
      rootMargin: '0px 0px -40px 0px',
    }
  );

  document.querySelectorAll('.sr').forEach(el => observer.observe(el));
}

// Run on DOM ready and after any Turbo/PJAX-style navigation
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initScrollReveal);
} else {
  initScrollReveal();
}
