function initNavbarSearchMobile() {
    const navbarLayout = document.querySelector('.navbar-layout');
    const searchGroup = document.querySelector('.navbar-search-group');
    const searchInput = document.querySelector('.navbar-search input[type="search"]');
    if (!searchInput) return;

    if (searchInput.dataset.mobileSearchBound === 'true') return;
    searchInput.dataset.mobileSearchBound = 'true';

    const expandSearch = function () {
        if (window.innerWidth < 992) {
            if (searchGroup) searchGroup.classList.add('search-expanded');
            if (navbarLayout) navbarLayout.classList.add('search-expanded');
        }
    };

    const collapseSearch = function () {
        if (searchGroup) searchGroup.classList.remove('search-expanded');
        if (navbarLayout) navbarLayout.classList.remove('search-expanded');
    };

    searchInput.addEventListener('focus', expandSearch);
    searchInput.addEventListener('touchstart', expandSearch, { passive: true });
    searchInput.addEventListener('blur', collapseSearch);

    document.addEventListener('pointerdown', function (e) {
        if (window.innerWidth >= 992) return;
        const searchForm = document.querySelector('.navbar-search');
        if (searchForm && !searchForm.contains(e.target)) {
            if (document.activeElement === searchInput) {
                searchInput.blur();
            }
            collapseSearch();
        }
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initNavbarSearchMobile);
} else {
    initNavbarSearchMobile();
}

document.addEventListener('livewire:navigated', initNavbarSearchMobile);

