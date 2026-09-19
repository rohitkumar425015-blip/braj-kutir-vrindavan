/**
 * Braj Kutir - Main JavaScript
 * A premium real estate website for Vrindavan
 */

// ============================================
// NAVBAR SCROLL EFFECT
// ============================================
function initNavbarScroll() {
  const navbar = document.getElementById('navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
  }
}

// ============================================
// SCROLL REVEAL ANIMATIONS
// ============================================
function initScrollReveal() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });

  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
}

// ============================================
// SMOOTH SCROLL
// ============================================
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
}

// ============================================
// MOBILE MENU
// ============================================
function initMobileMenu() {
  const mobileMenu = document.getElementById('mobileMenu');
  const mobileMenuClose = document.querySelector('.mobile-menu-close');
  const navHamburger = document.querySelector('.nav-hamburger');

  if (navHamburger && mobileMenu) {
    navHamburger.addEventListener('click', () => {
      mobileMenu.classList.add('open');
    });
  }

  if (mobileMenuClose && mobileMenu) {
    mobileMenuClose.addEventListener('click', () => {
      mobileMenu.classList.remove('open');
    });
  }

  // Close menu when clicking on a link
  if (mobileMenu) {
    mobileMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.remove('open');
      });
    });
  }
}

// ============================================
// FILTER TABS
// ============================================
function initFilterTabs() {
  // Project discovery filters
  const form = document.getElementById('projectFilters');
  const grid = document.getElementById('projectGrid');
  if (form && grid) {
    const cards = [...grid.querySelectorAll('.collection-card')];
    const count = document.getElementById('projectCount');
    const empty = document.getElementById('emptyState');
    const selects = [...form.querySelectorAll('select')];

    const applyFilters = () => {
      let visible = 0;
      cards.forEach(card => {
        const matches = selects.every(select => select.value === 'all' || card.dataset[select.name] === select.value || (select.name === 'location' && card.dataset.location.includes(select.value)));
        card.hidden = !matches;
        if (matches) visible += 1;
      });
      if (count) count.textContent = visible;
      if (empty) empty.hidden = visible > 0;
    };

    selects.forEach(select => select.addEventListener('change', applyFilters));
    form.addEventListener('submit', event => event.preventDefault());
    ['clearFilters', 'emptyClear'].forEach(id => {
      const button = document.getElementById(id);
      if (button) button.addEventListener('click', () => {
        selects.forEach(select => { select.value = 'all'; });
        applyFilters();
      });
    });
    applyFilters();
  }

  document.querySelectorAll('.filter-tab').forEach(tab => {
    tab.addEventListener('click', function() {
      // Remove active class from all tabs in the same container
      const container = this.closest('.filter-tabs');
      if (container) {
        container.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
      }

      this.classList.add('active');

      const filter = this.getAttribute('data-filter');
      if (filter) {
        document.querySelectorAll('.project-item').forEach(item => {
          item.style.display = filter === 'all' || item.getAttribute('data-category') === filter ? '' : 'none';
        });
      }
    });
  });
}

// ============================================
// ROI CALCULATOR
// ============================================
function initROICalculator() {
  const calculator = document.getElementById('roiCalculator');
  if (!calculator) return;

  const amountInput = document.getElementById('investmentAmount');
  const typeSelect = document.getElementById('investmentType');
  const horizonSelect = document.getElementById('timeHorizon');
  const rateInput = document.getElementById('appreciationRate');
  const calculateBtn = document.getElementById('calculateROI');
  const resultValue = document.getElementById('roiValue');

  function calculateROI() {
    if (!amountInput || !rateInput || !horizonSelect || !resultValue) return;

    const amount = parseFloat(amountInput.value) || 0;
    const rate = parseFloat(rateInput.value) || 0;
    const years = parseInt(horizonSelect.value) || 0;

    const futureValue = amount * Math.pow(1 + (rate / 100), years);
    const roiValue = Math.round(futureValue);

    resultValue.textContent = '₹ ' + roiValue.toLocaleString('en-IN');
  }

  if (calculateBtn) {
    calculateBtn.addEventListener('click', calculateROI);
  }

  // Calculate on input change
  if (amountInput) {
    amountInput.addEventListener('input', calculateROI);
  }
  if (rateInput) {
    rateInput.addEventListener('input', calculateROI);
  }
  if (horizonSelect) {
    horizonSelect.addEventListener('change', calculateROI);
  }

  // Initial calculation
  calculateROI();
}

// ============================================
// CONTACT FORM
// ============================================
function initContactForm() {
  const contactForm = document.getElementById('contactForm');
  if (!contactForm) return;

  contactForm.addEventListener('submit', function(e) {
    e.preventDefault();

    // Get form data
    const formData = new FormData(contactForm);
    const data = Object.fromEntries(formData);

    // Simple validation
    if (!data.name || !data.email || !data.phone) {
      alert('Please fill in all required fields.');
      return;
    }

    // Simulate form submission
    // In production, replace with actual API call
    console.log('Form submitted:', data);

    // Show success message
    alert('Thank you for reaching out. A Braj Kutir advisor will contact you shortly.');
    contactForm.reset();
  });
}

// ============================================
// PROJECT MODAL
// ============================================
function initProjectModal() {
  const modal = document.getElementById('projectModal');
  if (!modal) return;

  const modalClose = document.querySelector('.modal-close');
  const modalTitle = document.getElementById('modalTitle');
  const modalContent = document.getElementById('modalContent');

  // Open modal with project data
  document.querySelectorAll('.btn-view-details').forEach(btn => {
    btn.addEventListener('click', function() {
      const title = this.getAttribute('data-title');
      const content = this.getAttribute('data-content');

      if (modalTitle) modalTitle.textContent = title;
      if (modalContent) modalContent.innerHTML = content;
      modal.classList.add('open');
    });
  });

  // Close modal
  if (modalClose) {
    modalClose.addEventListener('click', () => {
      modal.classList.remove('open');
    });
  }

  // Close on outside click
  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.classList.remove('open');
    }
  });

  // Close on escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('open')) {
      modal.classList.remove('open');
    }
  });
}

// ============================================
// ACCORDION
// ============================================
function initAccordion() {
  document.querySelectorAll('.accordion-item').forEach(item => {
    const header = item.querySelector('.accordion-header');
    const content = item.querySelector('.accordion-content');
    const icon = item.querySelector('.accordion-icon');

    if (header && content) {
      header.addEventListener('click', () => {
        const isOpen = content.style.maxHeight;

        // Close all other accordions
        document.querySelectorAll('.accordion-item').forEach(otherItem => {
          if (otherItem !== item) {
            otherItem.querySelector('.accordion-content').style.maxHeight = null;
            otherItem.querySelector('.accordion-icon')?.classList.remove('fa-minus');
            otherItem.querySelector('.accordion-icon')?.classList.add('fa-plus');
          }
        });

        // Toggle current accordion
        if (isOpen) {
          content.style.maxHeight = null;
          if (icon) {
            icon.classList.remove('fa-minus');
            icon.classList.add('fa-plus');
          }
        } else {
          content.style.maxHeight = content.scrollHeight + 'px';
          if (icon) {
            icon.classList.remove('fa-plus');
            icon.classList.add('fa-minus');
          }
        }
      });
    }
  });
}

// ============================================
// COUNTER ANIMATION
// ============================================
function initCounterAnimation() {
  const counters = document.querySelectorAll('.counter');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  counters.forEach(counter => observer.observe(counter));
}

function animateCounter(element) {
  const target = parseInt(element.getAttribute('data-target'));
  const duration = 2000;
  const step = target / (duration / 16);
  let current = 0;

  const updateCounter = () => {
    current += step;
    if (current < target) {
      element.textContent = Math.floor(current).toLocaleString('en-IN');
      requestAnimationFrame(updateCounter);
    } else {
      element.textContent = target.toLocaleString('en-IN');
    }
  };

  updateCounter();
}

// ============================================
// BACK TO TOP BUTTON
// ============================================
function initBackToTop() {
  const backToTop = document.getElementById('backToTop');
  if (!backToTop) return;

  window.addEventListener('scroll', () => {
    backToTop.style.display = window.scrollY > 500 ? 'block' : 'none';
  });

  backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

// ============================================
// LAZY LOAD IMAGES
// ============================================
function initLazyLoad() {
  if ('IntersectionObserver' in window) {
    const lazyImages = document.querySelectorAll('img[data-src]');

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.removeAttribute('data-src');
          observer.unobserve(img);
        }
      });
    });

    lazyImages.forEach(img => observer.observe(img));
  }
}

// ============================================
// INITIALIZE ALL MODULES
// ============================================
document.addEventListener('DOMContentLoaded', () => {
  initNavbarScroll();
  initScrollReveal();
  initSmoothScroll();
  initMobileMenu();
  initFilterTabs();
  initProjectDiscovery();
  initROICalculator();
  initContactForm();
  initProjectModal();
  initAccordion();
  initCounterAnimation();
  initBackToTop();
  initLazyLoad();
});

// ============================================
// UTILITY FUNCTIONS
// ============================================

// Debounce function for performance
function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

// Throttle function for performance
function throttle(func, limit) {
  let inThrottle;
  return function(...args) {
    if (!inThrottle) {
      func.apply(this, args);
      inThrottle = true;
      setTimeout(() => inThrottle = false, limit);
    }
  };
}

// Format currency
function formatCurrency(amount, currency = '₹') {
  return currency + ' ' + amount.toLocaleString('en-IN');
}

// Truncate text
function truncateText(text, length) {
  if (text.length <= length) return text;
  return text.substring(0, length) + '...';
}
