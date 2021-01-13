export function editMixin(entityName) {
    return {
        props: [
            '_entity',
        ],
        mounted() {
            if (this._entity) {
                this.entity = this._entity;
                this.entity.active = (this.entity.active === 1)
            }
            this.frolaLoading = false;
        },
        data() {
            return {
                frolaConfig: {
                    placeholderText: 'Start typing...',
                    imageUploadURL: '/frola-upload',
                },
                entity: {
                    position: 0,
                    brand_id: null,
                    category_id: null,
                    subcategory_id: null,
                    active: true,
                    action: 'create',
                    name: '',
                    name_en: '',
                    description: '',
                    description_en: '',
                    slug: '',
                    title: '',
                    title_en: '',
                    shortText: '',
                    shortText_en: '',
                    article: '',
                    article_en: '',
                    imgPath: null,
                    pdfPath: null,
                    pdf1Path: null,
                    pdf2Path: null,
                },
                frolaLoading: true,
                action: '',
                imgData: "",
                snackBar: {
                    show: false,
                    position: 'center',
                    duration: 7000,
                    isInfinity: false,
                    message: ''
                },
                uploadReady: true,
                imgToUpload: null,
                isImgUploaded: false,
                isPdfUploaded: false,
            }
        },
        methods: {
            submitForm() {
                this.sendForm();
            },


            sendForm() {
                axios.post(`/admin/${this.entity.action}-${entityName}`, this.entity)
                    .then((res) => {
                        this.validate(res.data);
                    })
                    .catch((error) => {
                        console.log(error);
                    });

            },
            showSnackbar(message) {
                this.snackBar.show = true;
                this.snackBar.message = message;
            },
            validate(resData) {
                if (resData.validationErrors) {
                    this.showSnackbar(Object.values(resData.validationErrors).join("\n"))
                } else {
                    this.goToBrands();
                }
            },
            goToBrands() {
                window.location.replace(`/admin/${entityName}`)
            },
            removePicture() {
                this.uploadReady = false
                this.imgData = '';
                this.entity.imgPath = '';
                this.$nextTick(() => {
                    this.uploadReady = true
                })
            },

            uploadImg() {
                const formData = new FormData();
                formData.append("image", this.imgToUpload);
                axios.post('/upload-img', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then((res) => {
                        this.entity.imgPath = res.data.path
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            handleImg: function (event) {
                const input = event.target;
                const maxSize = 100000000; // 100mb

                if (input.files[0].size > maxSize) {
                    this.showSnackbar(`Maximum size allowed is ${maxSize / 1000} Mb`);
                    return false;
                }
                if (input.files && input.files[0]) {
                    this.imgToUpload = input.files[0];
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.imgData = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                    this.isImgUploaded = true;
                    this.uploadImg();
                }
            },

            uploadPdf() {
                const formData = new FormData();
                formData.append('pdf', this.pdfToUpload);
                axios.post('/upload-pdf', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then((res) => {
                        this.entity.pdfPath = res.data.path
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            handlePdf: function (event) {
                const pdf = event.target.files[0];
                const maxSize = 1000000000; // 1gb TODO put into config file
                const allowedTypes = ['application/pdf'];

                if (pdf.size > maxSize) {
                    this.showSnackbar(`Максимальный размер ${maxSize / 1000} Mb`);
                    return false;
                }

                if (!_.includes(allowedTypes, pdf.type)) {
                    this.showSnackbar(this.imageError = 'Загруженный файл не является .pdf');
                    return false;
                }
                this.pdfToUpload = pdf;
                console.log(this.pdfToUpload);
                this.uploadPdf();
            },

            actionTranslater(action) {
                switch (action) {
                    case 'create':
                        return 'Создать';
                    case 'copy':
                        return 'Копировать';
                    case 'edit':
                        return 'Редактировать';
                }
            }
        }
    }
}
