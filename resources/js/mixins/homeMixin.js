export const homeMixin = {
        data: () => ({
            email: null,
            text: null,
            errors: [],
            successMessage: null,
        }),
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
            },
            showModal(item) {
                this.$modal.show('product-modal', item);
            },
            hideModal() {
                this.$modal.hide('product-modal');
            },

            initRecaptcha() {
                this.$recaptcha("login").then((token) => {
                    this.recaptchaToken = token;
                    console.log(`recaptcha token loaded`);
                });
            },

            sendMessageTelegram(obj) {
                this.errors = [];

                if (!this.isValidForm()) {
                    console.log(1);
                    return false
                }

                axios.post(
                    `/home/check-recaptcha`,
                    {token: this.recaptchaToken}
                )
                    .then((res) => {
                        if (res.data.success) {
                            this.sendMessageProcess(obj);
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            sendMessageProcess(obj) {
                axios.post(
                    `https://api.telegram.org/bot1194766142:AAFwo9I9jMNwXNr5hYmJ9icF154Sarlgpo8/sendMessage`,
                    obj
                )
                    .then((res) => {
                        this.successMessage = this.__('layouts.footer.success_message')
                        this.resetForm()
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            isValidForm() {
                if (!this.email || this.email === '') {
                    this.errors.push(this.__('layouts.footer.err1'));
                } else if (!this.isValidEmail(this.email)) {
                    this.errors.push(this.__('layouts.footer.err2'));
                }

                if (!this.text || this.text === '') {
                    this.errors.push(this.__('layouts.footer.err3'));
                }

                return !this.errors.length;
            },

            isValidEmail (email) {
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },

            resetForm() {
                this.email = '';
                this.text = '';
                setTimeout(() => {
                    this.successMessage = '';
                    this.hideModal();
                }, 7000)
            }
        }
}
