@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Shopping - shop')
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
        <div class="col-12 mt-1 mb-2">
            <a href="{{route('admin.shopping.list')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all Shopping list</span>
            </a>
            <h4>Shopping</h4>
            <div>
                Date of purchase: {{parseDate(getMenusDate())}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="filters">
                <label>{{__('Object')}}</label>
                <select class="filter form-control" name="objectId">
                    {{--                    <option value="{{$object->id}}">{{$object->name}}</option>--}}
                    @foreach($objects as $objectNew)
                        <option value="{{$objectNew->id}}">{{$objectNew->name}}</option>
                    @endforeach
                </select>
            </div>
            <table class="table w-100 js-datatable-ajax" id="shopping-list"
                   data-datatable_request_url="{{route('admin.shopping.purchased.list.grid')}}"
            >
                <thead>
                <tr>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Product name') }}</th>
                    <th>{{ __('Object') }}</th>
                    <th>{{ __('Batch') }}</th>
                    <th>{{ __('Unit of measure') }}</th>
                    <th>{{ __('Required quantity') }}</th>
                    <th>{{ __('Purchased quantity') }}</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

            </table>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script type="text/javascript" src="{{ asset('vendors\js\tables\datatable\jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendors\js\tables\datatable\dataTables.bootstrap4.min.js') }}"></script>
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
                        // responsive: true,
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
                            {responsivePriority: 1, targets: 0, visible: true},
                            {responsivePriority: 2, targets: -1, visible: true},
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

            $.each($('.filter'), function () {
                data[$(this).attr('name')] = $(this).val();
            })

            initDataTablesAjax(data);
        }

        $(document).ready(function () {
            listeners()
            $('[name="objectId"]').change(function () {
                listeners()
            });

            $(document).on('click', '.notStored', function () {
                let purchasedAmount = $(this).parent().parent().find('.purchasedAmount').val();
                let shoppingListId = $(this).data('id');
                console.log(purchasedAmount);
                if(purchasedAmount == 0){
                    alert('Please fill the amount');
                }else {
                    $.ajax({
                        dataType: "json",
                        type: "POST",
                        url: $(this).data('route'),
                        data: {
                            "purchasedAmount": purchasedAmount,
                            "shoppingListId": shoppingListId,
                            "_token": "{{ csrf_token() }}"
                        },
                        beforeSend: function () {
                        },
                        success: function (response) {
                            if (response.success) {
                                listeners();
                            }
                        },
                        error: function (data) {

                        },
                        complete: function () {

                        }
                    });
                }
            })

            $(document).on('click', '.print', function () {
                let id = $(this).data('id');
                let batch = $("#batch-" + id).text();

                if (batch == 0) {
                    alert('Please first store an amount.');
                } else {
                    $.ajax({
                        dataType: "json",
                        type: "POST",
                        url: $(this).data('route'),
                        data: {
                            "shoppingListId": id,
                            "batch": batch,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            if (response.success) {
                                alert('Printed successfully');
                            } else {
                                alert('Cannot connect to printer');
                            }
                        },
                        error: function (data) {

                        },
                        complete: function () {

                        }
                    });
                }
            })
        })
    </script>
@endsection
