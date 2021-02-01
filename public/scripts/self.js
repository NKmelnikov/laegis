const product = {
    pathArray: window.location.pathname.split('/'),
    productCloak: $('.product-home-cloak'),
    pageItem: $('.page-item'),
    scrollTo: $('.scroll-to'),

    getSlug() {
        return window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1)
    },
    handleCollapse() {
        if(this.pathArray.length >= 5){
            $(`#${this.pathArray[3]}`).collapse('show');
            $(`.${this.pathArray[3]}`).addClass('active');
            $(`.${this.pathArray[4]}`).css({'color': '#ff5e15', 'background': '#f3f3f3'});
        } else if(this.pathArray.length === 4){
            $(`#${this.pathArray[3]}`).collapse('show');
            $(`.${this.pathArray[3]}`).addClass('active');
        }
    }
};

const header = {
    contactBurger: $('.item-contacts'),
    sidebar: $('.side-bar'),
    cross: $('.cross-square'),
    isHeaderButtonIdArray: ['o-s0', 'o-s1', 'o-s2', 'o-s3', 'o-s4', 'o-s5', 'o-s6', 'o-s7', 'o-s8', 'o-s9'],
    toggleSideBar() {
        header.sidebar.toggleClass('active');
    }
};

$(document).ready(function() {
    product.handleCollapse();
    header.contactBurger.click(header.toggleSideBar);
    header.cross.click(header.toggleSideBar);

    setTimeout(() => {
        $('.page-item').click(() => {
            $('.scroll-to')[0].scrollIntoView({
                behavior: 'smooth'
            });
        });
    }, 1000);
});

$(document).mouseup(function(e)
{
    // if the target of the click isn't the container nor a descendant of the container
    if (!header.sidebar.is(e.target) && header.sidebar.has(e.target).length === 0)
    {
        header.sidebar.removeClass('active');
    }
});

$(window).on('load', function() {
    product.productCloak.fadeOut('fast');

});
