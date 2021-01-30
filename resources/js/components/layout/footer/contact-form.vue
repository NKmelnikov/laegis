<template>
    <div class="contact-form-wrapper">
        <div class="form-input">
            <label>
                <input required v-model="email">
                <span class="placeholder">Email</span>
            </label>
        </div>
        <div class="form-input">
            <label>
                <textarea v-model="question" rows="2" required></textarea>
                <span class="placeholder">Вопрос</span>
            </label>
        </div>
        <button id="cf-submit" type="submit" class="button" @click="sendMessageTelegram">Отправить</button>
        <ul class="errors">
            <li v-for="err in errors">{{ err }}</li>
        </ul>
        <span class="success">{{ successMessage }}</span>
    </div>
</template>

<style>
.grecaptcha-badge {
    visibility: hidden !important;
}
</style>

<script>

export default {
    mounted() {
        this.$recaptchaLoaded().then(() => {
            this.initRecaptcha();
        })
    },
    data: () => ({
        recaptchaToken: null,
        email: null,
        question: null,
        successMessage: null,
        errors: [],
    }),
    methods: {
        initRecaptcha() {
            this.$recaptcha("login").then((token) => {
                this.recaptchaToken = token;
                console.log(`recaptcha token loaded`);
            });
        },

        sendMessageTelegram() {
            this.errors = [];

            if (!this.isValidForm()) {
                return false
            }

            axios.post(
                `/home/check-recaptcha`,
                {token: this.recaptchaToken}
            )
                .then((res) => {
                    if (res.data.success) {
                        this.sendMessageProcess();
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        sendMessageProcess() {
            axios.post(
                `https://api.telegram.org/bot1194766142:AAFwo9I9jMNwXNr5hYmJ9icF154Sarlgpo8/sendMessage`,
                this.getSendObject()
            )
                .then((res) => {
                    this.successMessage = 'Форма успешно отправлена, мы свяжемся с вами в ближайшее время!'
                    this.resetForm()
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        getSendObject() {
            return {
                chat_id: '-1001477233848',
                text: [
                    `*Вопрос*`,
                    `email: ${this.email}`,
                    `вопрос: _${this.question}_`
                ].join("\n"),
                parse_mode: 'markdown',
            }
        },

        isValidForm() {
            if (!this.email || this.email === '') {
                this.errors.push('Email не введён');
            } else if (!this.isValidEmail(this.email)) {
                this.errors.push('Email некорректный');
            }

            if (!this.question || this.question === '') {
                this.errors.push('Вопрос не введён');
            }

            console.log(!this.errors.length);
            return !this.errors.length;
        },

        isValidEmail: function (email) {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },

        resetForm() {
            this.email = '';
            this.question = '';
            setTimeout(() => {
                this.successMessage = '';
            }, 7000)
        }
    }
}
</script>
