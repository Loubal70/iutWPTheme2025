import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

export default function Testimonials() {
    return {
        swiperInstance: null,
        wrapper: null,

        init() {
            this.bind();
            this.checkWidth();
            this.watchResize();
        },

        bind() {
            this.wrapper = this.$el.querySelector('.swiper-wrapper');

            this.checkWidth = this.checkWidth.bind(this);
            this.watchResize = this.watchResize.bind(this);
            this.destroyInstance = this.destroyInstance.bind(this);
            this.initInstance = this.initInstance.bind(this);
        },

        checkWidth() {
            if (window.innerWidth > 1024) {
                this.initInstance();
            } else {
                this.destroyInstance();
            }
        },

        watchResize() {
            window.addEventListener('resize', this.checkWidth);
        },

        destroyInstance() {
            this.wrapper.removeAttribute('style');
            this.wrapper.classList.remove('swiper-wrapper');

            if (!this.swiperInstance) return;
            this.swiperInstance.destroy();
            this.swiperInstance = null;
        },

        initInstance() {
            this.wrapper.classList.add('swiper-wrapper');
            this.swiperInstance = new Swiper(this.$el, {
                slidesPerView: 2,
                spaceBetween: 10,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                pagination: {
                    el: ".swiper-pagination",
                },
            });
        }
    }
}
