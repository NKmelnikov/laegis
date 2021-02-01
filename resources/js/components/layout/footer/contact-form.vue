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
                <textarea v-model="text" rows="2" required></textarea>
                <span class="placeholder">Вопрос</span>
            </label>
        </div>
        <button id="cf-submit" type="submit" class="button" @click="sendMessageTelegram(getSendObject())">Отправить</button>
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
import {homeMixin} from "../../../mixins/homeMixin";

export default {
    mixins: [homeMixin],
    mounted() {
        this.$recaptchaLoaded().then(() => {
            this.initRecaptcha();
        })
    },
    data: () => ({
        recaptchaToken: null,

    }),
    methods: {
        getSendObject() {

            return {
                chat_id: '-1001477233848',
                text: [
                    `*Вопрос*`,
                    ``,
                    `email: ${this.email}`,
                    `вопрос: _${this.text}_`
                ].join("\n"),
                parse_mode: 'markdown',
            }
        },
    }
}
</script>
