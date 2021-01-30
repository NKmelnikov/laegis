<template>
    <div class="brands-link-wrapper">
        <a v-for="entity in entities" class="text" :href="entity.slug">{{entity.name}}</a>
    </div>
</template>

<script>

export default {
    mounted() {
        this.getEntities();
    },
    data: () => ({
        entities: [],
        entityName: ''
    }),
    methods: {
        getEntities() {
            axios.get(
                `/home/get-brands`
            )
                .then((res) => {
                    this.entities = res.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
}
</script>
