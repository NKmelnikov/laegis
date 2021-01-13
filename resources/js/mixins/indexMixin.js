export function indexMixin(entityName) {
    return {
        mounted() {
            this.getEntities();
        },
        data: () => ({
            entities: [],
            selected: [],
            searched: [],
            search: null,
            newPosition: null,
        }),
        methods: {
            getEntities(page = 1) {
                axios.get(`/admin/${entityName}/getAllPaginated?page=${page}`)
                    .then((res) => {
                        this.entities = res.data;
                        this.searched = res.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            onSelect(items) {
                this.selected = items
            },
            toLower(text) {
                return text.toString().toLowerCase()
            },
            searchByName(items, term) {
                if (term) {
                    return items.filter(item => this.toLower(item.name).includes(this.toLower(term)))
                }
                return items
            },
            searchOnTable() {
                this.searched = this.searchByName(this.entities, this.search)
            },
            changePositionManually() {
                axios.post(
                    `/admin/update-${entityName}-position-manually`,
                    {data: {currentPosition: this.selected[0].position, newPosition: this.newPosition}})
                    .then((res) => {
                        if (res.data.message === 'success') {
                            window.location.reload();
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            bulkActivate() {
                axios.post(`/admin/bulk-activate-${entityName}`, {data: this.selected})
                    .then((res) => {
                        console.log(res);
                        if (res.data.message === 'success') {
                            window.location.reload();
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            bulkDeactivate() {
                axios.post(`/admin/bulk-deactivate-${entityName}`, {data: this.selected})
                    .then((res) => {
                        console.log(res);
                        if (res.data.message === 'success') {
                            window.location.reload();
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            bulkDelete() {
                axios.post(`/admin/bulk-delete-${entityName}`, {data: this.selected})
                    .then((res) => {
                        if (res.data.message === 'success') {
                            window.location.reload();
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
        }
    }
}
