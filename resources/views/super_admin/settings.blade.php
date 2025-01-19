@extends('layouts.app')
@section('title', 'SUPER ADMIN PANEL')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>SUPER ADMIN PANEL</h1>
        <br>
        {{-- @include('layouts.partials.search_settings') --}}
    </section>

    <!-- Main content -->
    <section class="content">
        {!! Form::open([
            'url' => action([\App\Http\Controllers\SuperAdminController::class, 'enableModulesStore']),
            'method' => 'post',
            'id' => 'enable_module_form',
            'files' => true,
        ]) !!}
        <div class="row">
            <div class="col-xs-12">
                <!--  <pos-tab-container> -->
                <div class="col-xs-12 pos-tab-container">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pos-tab-menu">
                        <div class="list-group">
                            <a href="#" class="list-group-item text-center active">Login Image</a>
                            <a href="#" class="list-group-item text-center">Enables Modules</a>
                            <a href="#" class="list-group-item text-center">Common Modules</a>
                            <a href="#" class="list-group-item text-center">Location Activate</a>
                            <a href="#" class="list-group-item text-center">Internal Modules</a>
                            {{-- <a href="#" class="list-group-item text-center">Cheque Management</a> --}}
                            <a href="#" class="list-group-item text-center">SMS Settings</a>
                            {{-- <a href="#" class="list-group-item text-center">Product Settings</a> --}}
                            <a href="#" class="list-group-item text-center">Payment</a>
                            <a href="#" class="list-group-item text-center">Report</a>
                        </div>
                    </div>

                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                        @include('super_admin.partials.login_image')

                        @include('super_admin.partials.modules')

                        @include('super_admin.partials.settings_modules')

                        @include('super_admin.partials.location_activate')

                        @include('super_admin.partials.internal_modules')

                        {{-- @include('super_admin.partials.cheque_management') --}}

                        @include('super_admin.partials.settings_sms')

                        {{-- @include('super_admin.partials.settings_product') --}}

                        @include('super_admin.partials.settings_payment')

                        @include('super_admin.partials.settings_report')
                    </div>

                </div>
                <!--  </pos-tab-container> -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-danger pull-right" type="submit">@lang('business.update_settings')</button>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
    <!-- /.content -->
@stop
@section('javascript')
    <script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
    <script type="text/javascript">
        __page_leave_confirmation('#bussiness_edit_form');

        $("#btn_code_genarate").click(function() {
            var number = randomNumber(100000, 999999);
            $('#activation_code').val(number);
        });

        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
        }

        $("#btn_save_code").click(function() {
            if ($('#activation_code').val() != '') {
                var code = $('#activation_code').val();

                $.ajax({
                    method: 'post',
                    url: '/business-location/save-activate-code',
                    data: {
                        code: code
                    },

                    success: function(response) {
                        if (response.success == true) {
                            toastr.success(response.msg);
                        } else {
                            toastr.error(response.msg);
                        }
                    }

                });

            } else {
                toastr.error('Genarate activation code');
            }
        });

        $(document).on('change', '#sms_service_provider', function() {
            if ($(this).val() == 'default') {
                $('.default_sms_div').removeClass('hide');
            } else {
                $('.default_sms_div').addClass('hide');
            }
        });

        $(document).on('ifToggled', '#use_superadmin_settings', function() {
            if ($('#use_superadmin_settings').is(':checked')) {
                $('#toggle_visibility').addClass('hide');
                $('.test_email_btn').addClass('hide');
            } else {
                $('#toggle_visibility').removeClass('hide');
                $('.test_email_btn').removeClass('hide');
            }
        });
    </script>
@endsection
