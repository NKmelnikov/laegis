export const homeMixin = {
        methods: {
            getSlug() {
                return window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1)
            },
            getTranslations(entity, key) {
                return (this.locale !== 'ru' && entity[`${key}_${this.locale}`] !== null) ? entity[`${key}_${this.locale}`] : entity[key] ;
            }
        }
}
