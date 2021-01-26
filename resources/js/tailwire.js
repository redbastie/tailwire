Livewire.onLoad(() => {
    let pullDownRefreshing, infiniteScrolling = false;

    window.addEventListener('scroll', () => {
        if (document.getElementById('pullDownRefresh') && !pullDownRefreshing && window.scrollY < -100) {
            pullDownRefreshing = true;
            document.getElementById('pullDownRefresh').classList.remove('hidden');
            setTimeout(() => location.reload(), 100);
        }

        if (document.getElementById('infiniteScroll') && !infiniteScrolling && (window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
            infiniteScrolling = true;
            document.getElementById('infiniteScroll').classList.remove('hidden');
            Livewire.emit('infiniteScroll');
        }
    });

    Livewire.on('infiniteScrolled', () => {
        infiniteScrolling = false;
        document.getElementById('infiniteScroll').classList.add('hidden');
    });

    Livewire.on('bodyScrollLock', () => {
        let scrollWidth = document.body.scrollWidth;
        document.body.classList.add('overflow-hidden');
        document.body.style.width = scrollWidth + 'px';
    });

    Livewire.on('bodyScrollUnlock', () => {
        document.body.classList.remove('overflow-hidden');
        document.body.style.width = 'auto';
    });

    if (document.getElementById('recaptcha')) {
        window.recaptchaCallback = (response) => {
            Livewire.emit('recaptcha', response);
        }

        Livewire.on('resetRecaptcha', () => {
            grecaptcha.reset();
        });
    }
});
