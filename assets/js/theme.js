document.addEventListener('DOMContentLoaded', () => {
  const mobileMenuButton = document.getElementById('mobileMenuButton');
  const mobileMenu = document.getElementById('mobileMenu');
  const mobileMenuLinks = mobileMenu ? Array.from(mobileMenu.querySelectorAll('a')) : [];
  const slides = Array.from(document.querySelectorAll('[data-slide]'));
  const dots = Array.from(document.querySelectorAll('[data-dot]'));
  const nextButton = document.getElementById('nextSlide');
  const prevButton = document.getElementById('prevSlide');

  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', () => {
      const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
      mobileMenuButton.setAttribute('aria-expanded', String(!isExpanded));
      mobileMenu.classList.toggle('hidden', isExpanded);
    });

    mobileMenuLinks.forEach((link) => {
      link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        mobileMenuButton.setAttribute('aria-expanded', 'false');
      });
    });
  }

  if (!slides.length || !dots.length || !nextButton || !prevButton) {
    return;
  }

  let activeSlide = 0;
  let autoPlay;

  function renderSlide(index) {
    activeSlide = (index + slides.length) % slides.length;

    slides.forEach((slide, idx) => {
      slide.classList.toggle('active', idx === activeSlide);
    });

    dots.forEach((dot, idx) => {
      dot.classList.toggle('w-8', idx === activeSlide);
      dot.classList.toggle('bg-pine', idx === activeSlide);
      dot.classList.toggle('w-3', idx !== activeSlide);
      dot.classList.toggle('bg-pine/25', idx !== activeSlide);
    });
  }

  function startAutoPlay() {
    clearInterval(autoPlay);
    autoPlay = setInterval(() => renderSlide(activeSlide + 1), 5000);
  }

  nextButton.addEventListener('click', () => {
    renderSlide(activeSlide + 1);
    startAutoPlay();
  });

  prevButton.addEventListener('click', () => {
    renderSlide(activeSlide - 1);
    startAutoPlay();
  });

  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      renderSlide(index);
      startAutoPlay();
    });
  });

  renderSlide(0);
  startAutoPlay();
});
