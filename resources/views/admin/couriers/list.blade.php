@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Clients - courier list')
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
        <div class="col-12 col-md-6 mt-1">
            <h4>{{ __('Couriers') }}</h4>
            <div class="mb-1">{{ __('Delivery orders of') }}: {{parseDate(getMenusDate())}}</div>
        </div>
        <div class="col-12 col-md-6 mt-1 dtr-mtc">
            <button type="button" id="2" class="btn btn-success text-uppercase mb-1" data-toggle="modal"
                    data-target="#dashboard-modal-clients-orders-courier">{{ __('Add courier') }}
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1">
            <div class="filters">
                <label>{{__('Object')}}</label>
                <select class="filter form-control" name="objectId">
                    <option value="0">{{__('Select Kitchen')}}</option>
                    @foreach($objects as $objectNew)
                        <option value="{{$objectNew->id}}">{{$objectNew->name}}</option>
                    @endforeach
                </select>
                <label>{{__('Areas')}}</label>
                <select class="filter form-control" name="areaId">
                    <option value="0">{{__('Select area')}}</option>

                    @foreach($object->areas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
                </select>
                <label>{{__('Sub Areas')}}</label>

                <select class="filter form-control" name="subAreaId">
                    <option value="0">{{__('Select district')}}</option>

                    @foreach($object->areas->first()->subAreas as $subAreas)
                        <option value="{{$subAreas->id}}">{{$subAreas->name}}</option>
                    @endforeach
                </select>
                <label>{{__('Timeslots')}}</label>
                <select class="filter form-control" name="timeSlotId">
                    <option value="0">{{__('Select time slot')}}</option>

                    @foreach($object->areas->first()->timeSlots as $timeSlot)
                        <option value="{{$timeSlot->id}}">{{$timeSlot->start_at . '-'.$timeSlot->end_at}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="checkbox" id="selectAll">
                <label for="selectAll">{{__('Select All')}}</label>
            </div>
            <table class="table w-100 js-datatable-ajax" id="shopping-list"
                   data-datatable_request_url="{{route('admin.couriers.list.grid')}}"
            >
                <thead>
                <tr>
                    <th></th>
                    <th>{{ __('Order №') }}</th>
                    <th>{{ __('Menus') }}</th>
                    <th>{{ __('Object') }}</th>
                    <th>{{ __('Area') }}</th>
                    <th>{{ __('Sub Area') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th>{{ __('Timeslot') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Courier') }}</th>
                </tr>
                </thead>

            </table>
            <div>
                Number of menus: {{$orederRecipes}}
            </div>
        </div>
    </div>
    @include('admin.modals.dashboard-modal-clients-orders-courier')
@endsection

@section('page-scripts')
    <script>
        $(document).ready(function () {
            // $('[name="objectId"]').trigger('change');

            $('[name="objectId"]').change(function () {
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: "{{route("admin.courier.filter.objects")}}",
                    data: {
                        'objectId': $(this).val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        $('[name="areaId"]').html(response.areas);
                        $('[name="subAreaId"]').html(response.subAreas);
                        $('[name="timeSlotId"]').html(response.timeSlots);
                        $('#courierSelect').html(response.couriers);
                        listeners()
                    },
                    error: function (data) {
                    },
                    complete: function () {
                    }
                });
            });

            $('[name="subAreaId"]').change(function () {
                listeners()
            });

            $('[name="timeSlotId"]').change(function () {
                listeners()
            });

            $('[name="areaId"]').change(function () {
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: "{{route("admin.courier.filter.areas")}}",
                    data: {
                        'areaId': $(this).val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        console.log(1);
                        console.log(response.subAreas);
                        $('[name="subAreaId"]').html(response.subAreas);
                        $('[name="timeSlotId"]').html(response.timeSlots);
                        listeners()
                    },
                    error: function (data) {
                    },
                    complete: function () {
                    }
                });
            });

        })
    </script>
    <script type="text/javascript" src="{{ asset('vendors\js\tables\datatable\jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendors\js\tables\datatable\dataTables.bootstrap4.min.js') }}"></script>
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
                            {responsivePriority: 1, targets: [0, 1, 8], visible: true},
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

        // function initDataTablesScrollable() {
        //     console.log('initDataTablesScrollable started...');
        //
        //     let tables = $('.js-datatable-scrollable');
        //
        //     if (tables.length) {
        //         console.log('initDataTablesScrollable tables found');
        //
        //         $.each(tables, function () {
        //
        //             let table_id = $(this).attr('id');
        //             let table = $('#' + table_id).DataTable({
        //                 scrollY: '50vh',
        //                 scrollX: true,
        //                 scrollCollapse: true,
        //                 colReorder: true,
        //                 columnDefs: [
        //                     {
        //                         targets: 0,
        //                         orderable: false,
        //                         className: 'select-checkbox',
        //                         // width: '50px',
        //                     }
        //                 ],
        //                 select: {
        //                     style: 'os',
        //                     selector: 'td:first-child'
        //                 },
        //                 lengthMenu: [10, 25, 50, 75, 100],
        //                 pageLength: 10,
        //                 order: [
        //                     [0, 'asc']
        //                 ],
        //             });
        //
        //             table.on('click', 'tbody tr', function () {
        //                 $(this).toggleClass('active');
        //             });
        //         });
        //     }
        // };
        //
        // function initDataTablesBasic() {
        //     console.log('initDataTablesBasic started...');
        //
        //     let tables = $('.js-datatable-basic');
        //
        //     if (tables.length) {
        //         console.log('initDataTablesBasic tables found');
        //
        //         $.each(tables, function () {
        //             let is_compact_data_table = $('.js-datatable-basic.js-compact-data').length;
        //             console.log('is_compact_data_table', is_compact_data_table);
        //             let table_length_menu = is_compact_data_table ? [5, 10, 15, 25] : [10, 25, 50, 75, 100];
        //             let table_page_length = is_compact_data_table ? 5 : 10;
        //
        //             let table_id = $(this).attr('id');
        //             console.log('table id: ', table_id);
        //             let table = $('#' + table_id).DataTable({
        //                 responsive: true,
        //                 colReorder: true,
        //                 lengthMenu: table_length_menu,
        //                 pageLength: table_page_length,
        //                 // order: [
        //                 //     [0, 'desc']
        //                 // ],
        //             });
        //
        //             table.on('click', 'tbody tr', function () {
        //                 $(this).toggleClass('active');
        //             });
        //         });
        //
        //     }
        // };

        function listeners() {
            let data = [];

            // $('.filter').change(function () {
            $.each($('.filter'), function () {
                data[$(this).attr('name')] = $(this).val();
            })

            // setTimeout(function () {
            console.log(data);
            initDataTablesAjax(data);
            // }, 1500)
            // })
        }

        $(document).ready(function () {
            listeners()
            selectAll
            $(document).on('click', '.assign-courier', function (e) {
                let dataIds = '';
                $('.menu-courier-assign:checked').each(function () {
                    dataIds = dataIds + $(this).data('ids') + ','
                })

                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: "{{route("admin.courier.assign")}}",
                    data: {
                        'ids': dataIds,
                        'courierId': $('#courierSelect').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        listeners();
                    },
                    error: function (data) {
                    },
                    complete: function () {
                    }
                });
            })

            $(document).on('change', '#selectAll', function (e) {
                console.log('in')
                if ($(this).is(':checked')) {
                    $('.menu-courier-assign').prop('checked', true)
                } else {
                    $('.menu-courier-assign').prop('checked', false)
                }
            })
        })
    </script>

@endsection