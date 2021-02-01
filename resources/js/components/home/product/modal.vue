<template>
    <modal class="home-product-modal-wrapper" name="product-modal" :width="300" :resizable="true" @before-open="beforeOpen">
        <div class="input-container">
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
        </div>

        <ul class="errors">
            <li v-for="err in errors">{{ err }}</li>
        </ul>
        <span class="success">{{ successMessage }}</span>
        <button id="cf-submit" type="submit" class="button" @click="sendMessageTelegram(getSendObject())">Отправить</button>
    </modal>
</template>

<script>
import {homeMixin} from "../../../mixins/homeMixin";

export default {
    mixins: [homeMixin],
    name: 'MyComponent',
    mounted() {
        this.$recaptchaLoaded().then(() => {
            this.initRecaptcha();
        })
    },
    data: () => ({
        recaptchaToken: null,
        item: {},
        sendObject: {},
        email: '',
        text: '',
    }),
    methods: {
        beforeOpen(event) {
            this.item = event.params.item;
            this.sendObject = event.params.obj;
        },
        show () {
            this.$modal.show('product-modal');
        },
        hide () {
            this.$modal.hide('product-modal');
        },
        getSendObject() {
            return {
                chat_id: '-1001477233848',
                text: [
                    this.sendObject.type,
                    ``,
                    `Имя продукта: _${this.sendObject.name}_`,
                    `Категория: _${this.sendObject.category_name}_`,
                    `Подкатегория: _${this.sendObject.subcategory_name}_`,
                    `Бренд: _${this.sendObject.brand_name}_`,
                    `email: ${this.email}`,
                    `комментарий: _${this.text}_`
                ].join("\n"),
                parse_mode: 'markdown',
            }
        }

    }
}
</script>
