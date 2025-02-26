@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))

@section('page_header')
    <style>
        .mb-0 {
            background-color: red;
            margin-bottom: 5px;
        }

        .report-title {
            display: inline-block;
            font-size: 18px;
            line-height: 43px;
            color: #555;
            position: relative;
            font-weight: 700;
        }

        .voyager .card .card-header {
            border-bottom: none;
        }

        .voyager .card {
            box-shadow: none;
        }

        .btn-collapse {
            margin: 0;
            padding: 0;
        }
    </style>
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
        </h1>
        @stop

        @section('content')
            <div class="page-content browse container-fluid">
                @include('voyager::alerts')
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-bordered">
                            <div class="panel-body text-center">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link btn-collapse" data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                    <h1 class="report-title" style="color: white">Shreveport Table
                                                        Statistics</h1>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="container" style="max-width: 70%">
                                                    <div class="row">
                                                        <img src="{{ Voyager::image(setting('admin.icon_image')) }}"
                                                             alt="Logo">
                                                    </div>
                                                    <div class="row">
                                                        <h1 class="report-title">
                                                            Shreveport Table Statistics
                                                        </h1>
                                                    </div>
                                                    <div class="row text-left">
                                                        <div class="col-md-12">
                                                            <div class="DateRangeSelector">
                                                                <div class="DateRangeSelector-item"><label>Start
                                                                        Date</label> <input type="date"
                                                                                            name="start-date-login"
                                                                                            id="start-date-login"
                                                                                            required></div>
                                                                <div class="DateRangeSelector-item"><label>End
                                                                        Date</label>
                                                                    <input type="date" name="end-date-login"
                                                                           id="end-date-login" required></div>
                                                            </div>
                                                            <button type="button" class="btn btn-primary"
                                                                    id="get-data-login">Get Data
                                                            </button>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    function load_data(startDateLogin, endDateLogin) {
                                                                        $("#bodyDataLogin tr").remove();
                                                                        $("#bodyDataLoginDiv #exportLoginToPDF").remove();
                                                                        $.ajax({
                                                                            url: "{{ route('get-data-login') }}",
                                                                            method: "POST",
                                                                            data: {
                                                                                startDateLogin: startDateLogin,
                                                                                endDateLogin: endDateLogin
                                                                            },
                                                                            success: function (data) {
                                                                                data = JSON.parse(data);
                                                                                console.log(data);
                                                                                var bodyDataLogin = '';
                                                                                $.each(data.userLoginBetweenDates, function (index, row) {
                                                                                    bodyDataLogin += "<tr>"
                                                                                    bodyDataLogin += "<td>" + row.day + "</td><td>" + row.date + "</td><td>" + row.unique_login + "</td><td>" + row.total_login + "</td>";
                                                                                    bodyDataLogin += "</tr>";
                                                                                });
                                                                                var bodyDataTotalSignUp ='';
                                                                                bodyDataTotalSignUp+="<tr>";
                                                                                bodyDataTotalSignUp+="<td colspan='4' style='text-align: center'>Total SignUps: " + data.totalSignupBetweenDates.total_user_signup + "</td>";
                                                                                bodyDataTotalSignUp+="</tr>";
                                                                                if(data.userLoginBetweenDates.length !== 0)
                                                                                {
                                                                                    $("#bodyDataLogin").append(bodyDataLogin);
                                                                                    $("#bodyDataLogin").append(bodyDataTotalSignUp);
                                                                                    var exportButton = '<a id="exportLoginToPDF" class="btn btn-success float-right" href="/login-pdf-view/' + startDateLogin + '/' + endDateLogin + '" target="_blank">Export To PDF</a>';
                                                                                    $("#bodyDataLoginDiv").append(exportButton);
                                                                                } else {
                                                                                    $('#bodyDataLogin').html('<tr><td class="text-center" colspan="4">No data.</td></tr>');
                                                                                }


                                                                            },
                                                                            error: function (err) {
                                                                                if (err.status == 422) { // when status code is 422, it's a validation issue
                                                                                    $('#bodyDataLogin').html('<tr><td class="text-center" colspan="4">Please choose start date and end date.</td></tr>');
                                                                                    toastr.error('Start Date and End Date are required!', $title = null, $options = [])
                                                                                }
                                                                            }
                                                                        })
                                                                    }

                                                                    $(document).on('click', '#get-data-login', function () {
                                                                        var startDateLogin = $('#start-date-login').val();
                                                                        var endDateLogin = $('#end-date-login').val();
                                                                        if (startDateLogin === '') {
                                                                            toastr.error('Start Date is required!', $title = null, $options = [])
                                                                            return false;
                                                                        }
                                                                        if (endDateLogin === '') {
                                                                            toastr.error('End Date is required!', $title = null, $options = [])
                                                                            return false;
                                                                        }
                                                                        if(startDateLogin > endDateLogin)
                                                                        {
                                                                            toastr.error('Start Date must < End Date!', $title = null, $options = [])
                                                                            return false;
                                                                        }
                                                                        $('#bodyDataLogin').html('<tr><td class="text-center" colspan="4">Loading...</td></tr>');
                                                                        load_data(startDateLogin, endDateLogin);
                                                                    });

                                                                });
                                                            </script>
                                                        </div>

                                                        <div class="col-md-12" id="bodyDataLoginDiv">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col" class="text-center">Day</th>
                                                                    <th scope="col" class="text-center">Date</th>
                                                                    <th scope="col" class="text-center">Unique Logins
                                                                    </th>
                                                                    <th scope="col" class="text-center">Total Logins
                                                                    </th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="bodyDataLogin">
                                                                <tr>
                                                                    <td class="text-center" colspan="4">Please choose
                                                                        start date and end date.
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed btn-collapse"
                                                        data-toggle="collapse"
                                                        data-target="#collapseTwo" aria-expanded="false"
                                                        aria-controls="collapseTwo">
                                                    <h1 class="report-title" style="color: white">Shreveport Registration
                                                        Table Statistics</h1>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="container" style="max-width: 70%">
                                                    <div class="row">
                                                        <img src="{{ Voyager::image(setting('admin.icon_image')) }}"
                                                             alt="Logo">
                                                    </div>
                                                    <div class="row">
                                                        <h1 class="report-title">
                                                            Shreveport Registration Table Statistics
                                                        </h1>
                                                    </div>
                                                    <div class="row text-left">
                                                        <div class="col-md-12">
                                                            <label style="font-weight: 700;">Date Type</label>
                                                            <select class="date-type select2" id="date-type" name="date-type">
                                                                <option value="weekly">Weekly</option>
                                                                <option value="monthly">Monthly</option>
                                                            </select>
                                                            <div class="DateRangeSelector">
                                                                <div class="DateRangeSelector-item"><label>Start
                                                                        Date</label> <input type="date"
                                                                                            name="start-date-register"
                                                                                            id="start-date-register"
                                                                                            required></div>
                                                                <div class="DateRangeSelector-item"><label>End
                                                                        Date</label>
                                                                    <input type="date" name="end-date-register"
                                                                           id="end-date-register" required></div>
                                                            </div>
                                                            <button type="button" class="btn btn-primary"
                                                                    id="get-data-register">Get Data
                                                            </button>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    function loadDataRegister(dateTypeRegister, startDateRegister, endDateRegister) {
                                                                        $("#bodyDataRegister tr").remove();
                                                                        $("#bodyDataRegisterDiv #exportRegisterToPDF").remove();
                                                                        $("#bodyDataRegisterDiv #exportRegisterToCSV").remove();
                                                                        $.ajax({
                                                                            url: "{{ route('get-data-register') }}",
                                                                            method: "POST",
                                                                            data: {
                                                                                dateTypeRegister: dateTypeRegister,
                                                                                startDateRegister: startDateRegister,
                                                                                endDateRegister: endDateRegister
                                                                            },
                                                                            success: function (data) {
                                                                                var bodyDataRegister = '';
                                                                                $.each(data, function (index, row) {
                                                                                    bodyDataRegister += "<tr>"
                                                                                    bodyDataRegister += "<td>" + row.date + "</td><td>" + row.count + "</td>";
                                                                                    bodyDataRegister += "</tr>";
                                                                                });
                                                                                if(data.length !== 0)
                                                                                {
                                                                                    $("#bodyDataRegister").append(bodyDataRegister);
                                                                                    var exportButtonRegister = '<a id="exportRegisterToPDF" class="btn btn-success float-right" href="/register-pdf-view/' + dateTypeRegister + '/'+ startDateRegister + '/' + endDateRegister + '" target="_blank">Export To PDF</a>';
                                                                                    var exportButtonCSVRegister = '<a id="exportRegisterToCSV" style="margin-right:10px" class="btn btn-warning float-right" href="/register-csv-export/'+ startDateRegister + '/' + endDateRegister + '" target="_blank">Export To CSV</a>';
                                                                                    $("#bodyDataRegisterDiv").append(exportButtonRegister);
                                                                                    $("#bodyDataRegisterDiv").append(exportButtonCSVRegister);
                                                                                } else{
                                                                                    $('#bodyDataRegister').html('<tr><td class="text-center" colspan="4">No data.</td></tr>');
                                                                                }


                                                                            },
                                                                            error: function (err) {
                                                                                if (err.status == 422) { // when status code is 422, it's a validation issue
                                                                                    $('#bodyDataRegister').html('<tr><td class="text-center" colspan="4">Please choose start date and end date.</td></tr>');
                                                                                    toastr.error('Start Date and End Date are required!', $title = null, $options = [])
                                                                                }
                                                                            }
                                                                        })
                                                                    }

                                                                    $(document).on('click', '#get-data-register', function () {
                                                                        var dateTypeRegister = $('#date-type').val();
                                                                        var startDateRegister = $('#start-date-register').val();
                                                                        var endDateRegister = $('#end-date-register').val();
                                                                        if (startDateRegister === '') {
                                                                            toastr.error('Start Date is required!', $title = null, $options = [])
                                                                            return false;
                                                                        }
                                                                        if (endDateRegister === '') {
                                                                            toastr.error('End Date is required!', $title = null, $options = [])
                                                                            return false;
                                                                        }
                                                                        if(startDateRegister>endDateRegister)
                                                                        {
                                                                            toastr.error('Start Date must < End Date!', $title = null, $options = [])
                                                                            return false;
                                                                        }

                                                                            $('#bodyDataRegister').html('<tr><td class="text-center" colspan="4">Loading...</td></tr>');
                                                                        loadDataRegister(dateTypeRegister, startDateRegister, endDateRegister);
                                                                    });

                                                                });
                                                            </script>
                                                        </div>

                                                        <div class="col-md-12" id="bodyDataRegisterDiv">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col" class="text-center">{{$today}}</th>
                                                                    <th scope="col" class="text-center">Count</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="bodyDataRegister">
                                                                <tr>
                                                                    <td class="text-center" colspan="4">Please choose
                                                                        date type, start date and end date.
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @stop

        @section('css')
            @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
                <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
            @endif
        @stop

        @section('javascript')
        <!-- DataTables -->
            @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
                <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
            @endif
            <script>
                $(document).ready(function () {
                        @if (!$dataType->server_side)
                    var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => $orderColumn,
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [
                            ['targets' => 'dt-not-orderable', 'searchable' =>  false, 'orderable' => false],
                        ],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
                    @else
                    $('#search-input select').select2({
                        minimumResultsForSearch: Infinity
                    });
                    @endif

                    @if ($isModelTranslatable)
                    $('.side-body').multilingual();
                    //Reinitialise the multilingual features when they change tab
                    $('#dataTable').on('draw.dt', function () {
                        $('.side-body').data('multilingual').init();
                    })
                    @endif
                    $('.select_all').on('click', function (e) {
                        $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger('change');
                    });
                });


                var deleteFormAction;
                $('td').on('click', '.delete', function (e) {
                    $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', '__id') }}'.replace('__id', $(this).data('id'));
                    $('#delete_modal').modal('show');
                });

                @if($usesSoftDeletes)
                @php
                    $params = [
                        's' => $search->value,
                        'filter' => $search->filter,
                        'key' => $search->key,
                        'order_by' => $orderBy,
                        'sort_order' => $sortOrder,
                    ];
                @endphp
                $(function () {
                    $('#show_soft_deletes').change(function () {
                        if ($(this).prop('checked')) {
                            $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 1]), true)) }}"></a>');
                        } else {
                            $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 0]), true)) }}"></a>');
                        }

                        $('#redir')[0].click();
                    })
                })
                @endif
                $('input[name="row_id"]').on('change', function () {
                    var ids = [];
                    $('input[name="row_id"]').each(function () {
                        if ($(this).is(':checked')) {
                            ids.push($(this).val());
                        }
                    });
                    $('.selected_ids').val(ids);
                });
            </script>
@stop
