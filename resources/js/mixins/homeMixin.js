export const homeMixin = {
        methods: {
            getSlug() {
                return window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1)
            },
            getTranslations(entity, key) {
                return (this.locale !== 'ru' && entity[`${key}_${this.locale}`] !== null) ? entity[`${key}_${this.locale}`] : entity[key] ;
            },
            isInViewport(el) {
                const scroll = window.scrollY || window.pageYOffset;
                const boundsTop = el.getBoundingClientRect().top + scroll;
                const viewport = {
                    top: scroll,
                    bottom: scroll + window.innerHeight,
                };

                const bounds = {
                    top: boundsTop,
                    bottom: boundsTop + el.clientHeight,
                };

                return (bounds.bottom >= viewport.top && bounds.bottom <= viewport.bottom)
                    || (bounds.top <= viewport.bottom && bounds.top >= viewport.top);
            }
        }
}
