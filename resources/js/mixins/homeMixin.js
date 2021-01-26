export const homeMixin = {
        methods: {
            getSlug() {
                return window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1)
            },
            getTranslations(entity) {
                return (this.locale !== 'ru' && entity[`name_${this.locale}`] !== null) ? entity[`name_${this.locale}`] : entity.name ;
            }
        }
}
