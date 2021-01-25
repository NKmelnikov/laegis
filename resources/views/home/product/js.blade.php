@extends('layouts.app')
@section ('script')

    <script type="text/javascript">

        const product = {
            getSlug() {
                return window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1)
            },
        }

        $(document).ready(function() {
            $(`#${product.getSlug()}`).collapse('show');
            $(`.${product.getSlug()}`).addClass('active');
        });

    </script>

@endsection
