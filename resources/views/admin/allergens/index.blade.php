@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - allergens list')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors\css\vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors\css\tables\datatable\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors\css\tables\datatable\responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-8 mt-1">
            <h4>{{__('Allergens')}}</h4>
        </div>
        @if(checkAccess('Allergens','create_edit'))
            <div class="col-12 col-md-4 mt-1 dtr-mtc">
                <a href="{{route('admin.allergens.add.view')}}">
                    <button type="button" class="btn btn-dark text-uppercase">{{__('Add allergen')}}</button>
                </a>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-12 mt-1">
            <div class="dataTables_scroll">
                <table class="table w-100 js-datatable-ajax" id="allergens" data-datatable_request_url="{{ route('admin.allergens.gridDataAdminAllergens') }}">
                    <thead>
                    <tr>
                        <th></th>
                        <th>{{ 'ID' }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Created at') }}</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script type="text/javascript" src="{{ asset('vendors\js\tables\datatable\jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors\js\tables\datatable\dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors\js\tables\datatable\dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors\js\tables\datatable\dataTables.rowReorder.min.js') }}"></script>
    <script type="text/javascript">
        function initDataTablesAjax(data = []) {
            console.log('initDataTablesAjax started...');

            let tables = $('.js-datatable-ajax');

            // If tables present in page
            if (tables.length) {
                console.log('initDataTablesAjax tables found');

                // Init each table
                $.each(tables, function () {
                    let table_id = $(this).attr('id');
                    let ajax_url = $(this).data('datatable_request_url');
                    let form = $('[data-table_id="' + table_id + '"]');

                    let is_large_data_table = $('.js-datatable-ajax').length;
                    let table_length_menu = is_large_data_table ?
                        [[10, 25, 50, 100, 250, 500, 750, 1000, -1], [10, 25, 50, 100, 250, 500, 750, 1000, "All"]] :
                        [10, 25, 50, 100, 250, 500, 750, 1000];
                    let table_page_length = is_large_data_table ? 10 : 25;
                    let table_buttons =
                        [
                            {
                                extend: "print",
                                title: 'DogFoodEbilling' + '_' + Math.round((new Date()).getTime() / 1000),
                            },
                            {
                                extend: "copyHtml5",
                                title: 'DogFoodEbilling'
                            },
                            {
                                extend: "csvHtml5",
                                title: 'DogFoodEbilling' + '_' + Math.round((new Date()).getTime() / 1000),
                            },
                            {
                                extend: 'pdfHtml5',
                                title: 'DogFoodEbilling' + '_' + Math.round((new Date()).getTime() / 1000),
                            }
                        ];
                    let locale = $('meta[name="app-locale"]').attr('content') ?
                        $('meta[name="app-locale"]').attr('content') : 'bg';
                    let scroll_y = is_large_data_table ? '500px' : '400px';

                    let table = $('#' + table_id).DataTable({
                        rowReorder: {
                            selector: 'td:nth-child(2)'
                        },
                        responsive: true,
                        // dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
                        "bDestroy": true,
                        searchDelay: 2000,
                        minLength: 5,
                        serverSide: true,
                        stateSave: true,
                        autoWidth: true,
                        processing: true,
                        searching: true,
                        scrollY: scroll_y,
                        scrollX: true,
                        scrollCollapse: true,
                        colReorder: false,
                        deferRender: true,

                        lengthMenu: table_length_menu,
                        pageLength: table_page_length,

                        // language: {
                        //     url: '/theme/admin/data-tables/translations/' + locale + '.json'
                        // },

                        stateSaveParams: function (oSettings, sValue) {
                            form.find(".form-control").each(function () {
                                sValue[$(this).attr('name')] = $(this).val();
                            });
                            return sValue;
                        },
                        stateLoadParams: function (oSettings, oData) {
                            //Load custom filters
                            form.find(".form-control").each(function () {
                                let element = $(this);
                                if (oData[element.attr('name')]) {
                                    element.val(oData[element.attr('name')]);
                                }
                            });

                            return true;
                        },

                        ajax: {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: ajax_url, // ajax source
                            type: "POST",
                            data: data,
                            // timeout: 60000
                        },

                        buttons: table_buttons,

                        columnDefs: [
                            // {responsivePriority: 1, targets: 0, orderable: false},
                            {responsivePriority: 1, targets: [0, 2], visible: true},
                            // {responsivePriority: 3, targets: -1}
                        ]
                    });

                    // table.columns.adjust().draw();
                    // $(window).resize( function () {
                    //     console.log('ADJUST WONDOW');
                    //     table.columns.adjust();
                    // } );
                    setTimeout(function () {
                        let table = $('#' + table_id)
                        table.parents('.dataTables_scroll').find('.dataTables_scrollHeadInner').addClass('w-100');
                        table.parents('.dataTables_scroll').find('table').addClass('w-100');
                    }, 1500)

                    table.on('responsive-resize', function (e, datatable, columns) {
                        let count = columns.reduce(function (a, b) {
                            return b === false ? a + 1 : a;
                        }, 0);

                        if (!count) $('#' + table_id).find('.my_control').addClass('hidden');
                        else $('#' + table_id).find('.my_control').removeClass('hidden');
                    });

                    if (form.length) {
                        form.on('click', 'kt-search', function (e) {
                            e.preventDefault();
                            let params = {};
                            form.find('.datatable-input').each(function () {
                                let i = $(this).data('col-index');
                                if (params[i]) {
                                    params[i] += '|' + $(this).val();
                                } else {
                                    params[i] = $(this).val();
                                }
                            });
                            $.each(params, function (i, val) {
                                // apply search params to datatable
                                table.column(i).search(val ? val : '', false, false);
                            });
                            table.table().draw();
                        });

                        form.on('click', '.kt-reset', function (e) {
                            e.preventDefault();
                            form.find('.datatable-input').each(function () {
                                if ($(this).attr('type') === 'date') {
                                    Date.prototype.yyyymmdd = function () {
                                        let yyyy = this.getFullYear().toString();
                                        let mm = (this.getMonth() + 1).toString();
                                        let dd = this.getDate().toString();
                                        return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
                                    };

                                    let date = new Date();
                                    $(this).val(date.yyyymmdd());
                                } else {
                                    $(this).val('');
                                }
                                table.column($(this).data('col-index')).search('', false, false);
                            });
                            table.table().draw();
                        });

                        $(document).keyup(function (event) {
                            if (event.keyCode === 13) {
                                $(".kt-search").click();
                            }
                            if (event.keyCode === 27) {
                                $(".kt-reset").click();
                            }
                        });

                        // form.find('.kt-datepicker').datepicker({
                        //     todayHighlight: true,
                        //     autoclose: true,
                        //     templates: {
                        //         leftArrow: '<i class="la la-angle-left"></i>',
                        //         rightArrow: '<i class="la la-angle-right"></i>',
                        //     },
                        // });
                    }

                    if (is_large_data_table) {
                        $('#export_print').on('click', function (e) {
                            e.preventDefault();
                            table.button(0).trigger();
                        });

                        $('#export_copy').on('click', function (e) {
                            e.preventDefault();
                            table.button(1).trigger();
                        });

                        $('#export_csv').on('click', function (e) {
                            e.preventDefault();
                            table.button(2).trigger();
                        });

                        $('#export_pdf').on('click', function (e) {
                            e.preventDefault();
                            table.button(3).trigger();
                        });
                    }

                    table.on('click', 'tbody tr', function () {
                        $(this).toggleClass('active');
                    });

                });
            }
        };

        function listeners() {
            let data = [];

            $('.filter').on('change keyup', function () {
                $.each($('.filter'), function () {
                    if ($(this).is(':checkbox')) {
                        data[$(this).attr('name')] = $(this).is(':checked') ? 1 : 0;
                    } else {
                        data[$(this).attr('name')] = $(this).val();
                    }
                })
                initDataTablesAjax(data);
            })
        }

        $(document).ready(function () {
            listeners()
            initDataTablesAjax()
            // initDataTablesScrollable()
            // initDataTablesBasic()

            $(document).on('click', '.deleteElementDataTable', function (e) {
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: $(this).data('route'),
                    data: {
                        "_token": $('[name=csrf-token]').attr('content'),
                    },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        if (response.success) {
                            initDataTablesAjax();
                        }
                    },
                    error: function (data) {
                    },
                    complete: function () {
                    }
                });
            });
        })
    </script>
@endsection
