/**
 * ABKIG - Main JavaScript
 * Akademi Bisnis Kuliner Indonesia Global
 */

document.addEventListener('DOMContentLoaded', function () {

  // =============================================
  // NAVBAR SCROLL BEHAVIOR
  // =============================================
  const navbar = document.querySelector('.navbar');
  
  function handleNavbarScroll() {
    if (window.scrollY > 80) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  }

  if (navbar && navbar.classList.contains('navbar-transparent')) {
    window.addEventListener('scroll', handleNavbarScroll, { passive: true });
    handleNavbarScroll(); // Run on load
  }

  // =============================================
  // MOBILE HAMBURGER MENU
  // =============================================
  const toggle = document.getElementById('navToggle');
  const menu = document.getElementById('navMenu');

  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      toggle.classList.toggle('active');
      menu.classList.toggle('open');
      document.body.style.overflow = menu.classList.contains('open') ? 'hidden' : '';
    });

    // Close menu when nav link clicked
    menu.querySelectorAll('.nav-link').forEach(function (link) {
      link.addEventListener('click', function () {
        toggle.classList.remove('active');
        menu.classList.remove('open');
        document.body.style.overflow = '';
      });
    });
  }

  // =============================================
  // SMOOTH SCROLL FOR ANCHOR LINKS
  // =============================================
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href === '#') return;
      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        const offset = 80;
        const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  // =============================================
  // INTERSECTION OBSERVER — FADE-IN ANIMATIONS
  // =============================================
  const animElements = document.querySelectorAll(
    '.fade-in, .slide-in-left, .slide-in-right'
  );

  if (animElements.length > 0) {
    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
    );

    animElements.forEach(function (el) {
      observer.observe(el);
    });
  }

  // =============================================
  // COUNTER ANIMATION FOR STATS
  // =============================================
  function animateCounter(el) {
    const target = parseInt(el.dataset.target, 10);
    if (isNaN(target)) return;
    const duration = 1800;
    const start = performance.now();

    function update(now) {
      const elapsed = now - start;
      const progress = Math.min(elapsed / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
      const current = Math.round(eased * target);
      el.textContent = current.toLocaleString('id-ID') + (el.dataset.suffix || '');
      if (progress < 1) requestAnimationFrame(update);
    }
    requestAnimationFrame(update);
  }

  const statNumbers = document.querySelectorAll('[data-target]');
  if (statNumbers.length > 0) {
    const statObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            statObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 }
    );
    statNumbers.forEach(function (el) {
      statObserver.observe(el);
    });
  }

  // =============================================
  // CONTACT FORM VALIDATION
  // =============================================
  const contactForm = document.getElementById('contactForm');

  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      let valid = true;

      const fields = [
        { id: 'nama', minLen: 2, msg: 'Nama minimal 2 karakter.' },
        { id: 'email', type: 'email', msg: 'Email tidak valid.' },
        { id: 'hp', minLen: 8, msg: 'Nomor HP minimal 8 digit.' },
        { id: 'pesan', minLen: 10, msg: 'Pesan minimal 10 karakter.' },
      ];

      fields.forEach(function (field) {
        const input = document.getElementById(field.id);
        const errEl = document.getElementById(field.id + 'Error');
        if (!input) return;
        
        let err = '';

        if (!input.value.trim()) {
          err = 'Kolom ini wajib diisi.';
        } else if (field.type === 'email') {
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailRegex.test(input.value.trim())) err = field.msg;
        } else if (field.minLen && input.value.trim().length < field.minLen) {
          err = field.msg;
        }

        if (errEl) {
          errEl.style.display = err ? 'block' : 'none';
          errEl.textContent = err;
        }

        if (err) {
          valid = false;
          input.style.borderColor = '#dc3545';
        } else {
          input.style.borderColor = '';
        }
      });

      if (!valid) {
        e.preventDefault();
        return;
      }

      // Show success message (demo)
      const successEl = document.getElementById('formSuccess');
      if (successEl) {
        e.preventDefault();
        successEl.style.display = 'flex';
        contactForm.reset();
        setTimeout(function () {
          successEl.style.display = 'none';
        }, 5000);
      }
    });

    // Real-time validation clear
    contactForm.querySelectorAll('input, textarea').forEach(function (el) {
      el.addEventListener('input', function () {
        this.style.borderColor = '';
        const err = document.getElementById(this.id + 'Error');
        if (err) err.style.display = 'none';
      });
    });
  }

  // =============================================
  // NEWS FILTER (Newsroom page)
  // =============================================
  const filterBtns = document.querySelectorAll('.filter-btn[data-filter]');
  const newsItems  = document.querySelectorAll('.news-card[data-category]');

  if (filterBtns.length > 0) {
    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const filter = this.dataset.filter;

        filterBtns.forEach(function (b) { b.classList.remove('active'); });
        this.classList.add('active');

        newsItems.forEach(function (item) {
          if (filter === 'all' || item.dataset.category === filter) {
            item.style.display = '';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  }

  // =============================================
  // ADMIN: Confirm delete
  // =============================================
  document.querySelectorAll('.confirm-delete').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      if (!confirm('Apakah Anda yakin ingin menghapus berita ini? Tindakan ini tidak bisa dibatalkan.')) {
        e.preventDefault();
      }
    });
  });

  // =============================================
  // BACK TO TOP BUTTON
  // =============================================
  const backToTop = document.getElementById('backToTop');
  if (backToTop) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 400) {
        backToTop.style.opacity = '1';
        backToTop.style.pointerEvents = 'auto';
      } else {
        backToTop.style.opacity = '0';
        backToTop.style.pointerEvents = 'none';
      }
    });

    backToTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // =============================================
  // ACCORDION (if used)
  // =============================================
  document.querySelectorAll('.accordion-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const item = this.closest('.accordion-item');
      const body = item.querySelector('.accordion-body');
      const isOpen = item.classList.contains('open');

      document.querySelectorAll('.accordion-item.open').forEach(function (openItem) {
        openItem.classList.remove('open');
        openItem.querySelector('.accordion-body').style.maxHeight = '0';
      });

      if (!isOpen) {
        item.classList.add('open');
        body.style.maxHeight = body.scrollHeight + 'px';
      }
    });
  });

});
