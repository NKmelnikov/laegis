<template>
    <div class="product-container">
        <div class="product-item">
            <div class="product-img" style="{'background-image': 'url(' + env.serverURL + product.imgPath + ')'}"></div>
            <div class="product-title-desc-container">
                <div class="product-item__header">
                    <div class="product-item__title">{{product.name}}</div>
                </div>
                <div class="product-item__content description">

                </div>
            </div>
            <mat-card-actions class="button-container">

                <button (click)="openDialog('request', product)" mat-flat-button class="price">Запросить цену</button>
                <a
                    mat-flat-button
                    class="more"
                    routerLink="/products/{{product.category_slug}}/{{product.subcategory_slug}}/{{product.slug}}"
                >Подробнее</a>
            </mat-card-actions>
        </div>
        <mat-spinner *ngIf="productsToShow.length <= 0 && !productsToShow['loaded']"></mat-spinner>
        <div *ngIf="productsToShow.length === 0 && productsToShow['loaded']">В этой категории продукты не представлены</div>
    </div>
    <div class="pagination-block" [ngClass]="{'single-page': productsToShow.length <= pageSize}">
        <ngb-pagination
            [(page)]="page"
            (pageChange)="onPageChange()"
            [pageSize]="pageSize"
            [collectionSize]="productsToShow.length">
        </ngb-pagination>
    </div>
</template>

<script>
export default {
    props: [
        'products'
    ],
    mounted() {
        console.log(this.products);
    },
    data: () => ({
        entities: [],
        entityName: ''
    }),
    methods: {

    }
}
</script>
