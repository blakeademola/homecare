<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>@yield('title') | HOMECARE</title>

    <link rel="shortcut icon" href="{{  asset('images/icon/homecare.png')  }}"/>

    @include('layouts.partials._styles')

    @yield('page-style')
</head>

<body class="animsition">
<div class="page-wrapper">

    <!-- MENU SIDEBAR-->
    @include('layouts.partials._sidebar')
    <!-- END MENU SIDEBAR-->

    <!-- HEADER MOBILE-->
    @include('layouts.partials._header_mobile')
    <!-- END HEADER MOBILE-->

    <!-- PAGE CONTAINER-->
    <div class="page-container2">
        <!-- HEADER DESKTOP-->
        @include('layouts.partials._header_web')
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @yield('pre-content')
                            <div class="card @yield('content-card-attr')">
                                <div class="card-header">
                                    <strong class="card-title">@yield('title')</strong>
                                    @yield('button-right')
                                </div>

                                <div class="card-body @yield('content-attr')">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © {{ \Carbon\Carbon::now()->year }} Homecare. All rights
                        reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->

@yield('extra-contents')

@include('layouts.partials.alert')

{{--@include('layouts.partials.confirm')--}}

@include('layouts.partials._scripts')

@yield('page-script')

<script>
    $(document).ready(function () {

        $('.jsSelectAllInGroup').on('click', function (event) {
            $state = this.checked;
            $(this).closest('.permissionGroup').find('input[type=checkbox]').each(function () {
                this.checked = $state;
            });
        });

        $('#select-all').click(function (event) {
            var btn = this,
                toStatus = btn.checked;
            //loop through each checkbox
            $('.uniform').each(function () {
                $(this).prop('checked', toStatus);
            });
            event.stopPropagation();

        });

        $('form').submit(function () {
            $.LoadingOverlay('show');
        })

    });
    @include('layouts.partials._noty')
</script>
</body>

</html>
<!-- end document-->
