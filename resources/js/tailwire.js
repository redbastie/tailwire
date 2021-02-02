Livewire.onLoad(() => {
    window.addEventListener('scroll', () => {
        let swipeDownRefresh = document.getElementById('swipeDownRefresh');
        let infiniteScroll = document.getElementById('infiniteScroll');

        if (swipeDownRefresh && swipeDownRefresh.style.display === 'none' && window.scrollY < -100) {
            swipeDownRefresh.style.display = 'block';
            setTimeout(() => location.reload(), 100);
        }

        if (infiniteScroll && infiniteScroll.style.display === 'none' && (window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
            infiniteScroll.style.display = 'block';
            Livewire.emit('infiniteScroll');
        }
    });

    Livewire.on('bodyScrollLock', () => {
        document.body.style.width = document.body.scrollWidth + 'px';
        document.body.style.overflow = 'hidden';
    });

    Livewire.on('bodyScrollUnlock', () => {
        document.body.style.width = 'auto';
        document.body.style.overflow = 'auto';
    });
});
