@extends('layouts.app')
@section ('script')

    <script type="text/javascript">

        const product = {
            pathArray: window.location.pathname.split('/'),
            cloak: $('.product-home-cloak'),
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
        }

        $(document).ready(function() {
            product.handleCollapse();
        });

        $(window).on('load', function() {
            product.cloak.fadeOut('fast');
        });

    </script>

@endsection
