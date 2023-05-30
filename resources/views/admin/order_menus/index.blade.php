@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Clients - orders from menu')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{ asset('vendors\css\tables\datatable\dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css"
      href="{{ asset('vendors\css\tables\datatable\responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-md-6 mt-1">
    <h4>Menus orders</h4>
  </div>
{{--  <div class="col-12 col-md-6 mt-1 dtr-mtc">--}}
{{--    <button type="button" id="2" class="btn btn-dark text-uppercase mb-1">Export (.xls)</button>--}}
{{--  </div>--}}
</div>
<div class="row">
        <div class="col-12 mt-1">
            <div class="dataTables_scroll">
                <table class="table w-100 js-datatable-ajax" id="order-menus" style="max-width: 100%;" 
                       data-datatable_request_url="{{ route('admin.order-menus.gridDataAdminOrderMenus') }}"
                >
                    <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('Order #') }}</th>
                        <th>{{ __('Client') }}</th>
                        <th>{{ __('Area') }}</th>
                        <th>{{ __('Subarea') }}</th>
                        <th>{{ __('Object') }}</th>
                        <th>{{ __('Order Status') }}</th>
                        <th>{{ __('Payment status') }}</th>
                        <th>{{ __('Created at') }}</th>
                    </tr>
                    </thead>

                </table>
            </div>
    </div>
</div>
@endsection

@section('page-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.js-show-order-menus', function () {
                let url = $(this).data('url'),
                    thisEl = $(this).parents().eq(1);

                $.ajax({
                    method: 'POST',
                    url: url,
                    dataType: 'json',
                    beforeSend: function beforeSend(xhr, type) {
                        if (!type.crossDomain) {
                            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                        }
                    },
                    success: function (response) {
                        if (response.success === true) {
                            if (thisEl.next('tr').hasClass('menu-recipes')) {
                                thisEl.next('tr').remove()
                            } else {
                                thisEl.after(response.view);
                                iSubDt(thisEl.next('tr').find('table'));
                            }
                        }
                    }
                })
            })
        })
        var iSubDt = function(el) {
            $(el).DataTable({
                responsive: true,
                paging: false,
                ordering: false,
                info: false,
                searching: false,
                autoWidth: true,
            });
        }
    </script>
    @include('admin._partials.datatable')
@endsection
