const header = document.querySelector('[data-header]');
const menuToggle = document.querySelector('[data-menu-toggle]');
const mobileMenu = document.querySelector('[data-mobile-menu]');

const updateHeader = () => header?.classList.toggle('scrolled', window.scrollY > 24);
updateHeader();
window.addEventListener('scroll', updateHeader, { passive: true });

const closeMenu = () => {
    menuToggle?.classList.remove('active');
    menuToggle?.setAttribute('aria-expanded', 'false');
    mobileMenu?.classList.remove('open');
    mobileMenu?.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('menu-open');
};

menuToggle?.addEventListener('click', () => {
    const isOpen = !mobileMenu?.classList.contains('open');
    menuToggle.classList.toggle('active', isOpen);
    menuToggle.setAttribute('aria-expanded', String(isOpen));
    mobileMenu?.classList.toggle('open', isOpen);
    mobileMenu?.setAttribute('aria-hidden', String(!isOpen));
    document.body.classList.toggle('menu-open', isOpen);
});

mobileMenu?.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.14, rootMargin: '0px 0px -40px' });

document.querySelectorAll('.reveal, .route-map').forEach((element) => observer.observe(element));

document.querySelectorAll('.accordion details').forEach((detail) => {
    detail.addEventListener('toggle', () => {
        if (!detail.open) return;
        document.querySelectorAll('.accordion details[open]').forEach((other) => {
            if (other !== detail) other.removeAttribute('open');
        });
    });
});

document.querySelector('[data-signup-form]')?.addEventListener('submit', async (event) => {
    event.preventDefault();
    const form = event.currentTarget;
    const message = document.querySelector('[data-form-message]');
    const button = form.querySelector('button');

    button.disabled = true;
    if (message) message.textContent = 'Un attimo...';

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: { 'Accept': 'application/json' },
        });
        const data = await response.json();

        if (!response.ok) throw new Error(data.message || 'Non è stato possibile completare l’iscrizione.');
        if (message) message.textContent = data.message;
        form.reset();
    } catch (error) {
        if (message) message.textContent = error.message;
    } finally {
        button.disabled = false;
    }
});
