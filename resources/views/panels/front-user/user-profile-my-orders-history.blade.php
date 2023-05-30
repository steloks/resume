<div class="row">
  <div class="col-12 ta-dl-mc mb-1r">
    <h2 class="ff-fptdemi">My orders</h2>
  </div>
</div>
<div class="row">
    <div class="col-12 mt-1 mb-1">
        <div class="dataTables_scroll">
            <table class="table w-100 js-datatable-ajax" id="client_orders"
                   data-datatable_request_url="{{ route('profile.gridOrderData') }}"
            >
                <thead>
                <tr>
                    <th>{{ __('Order №') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Price') }}</th>
                    <th>{{ __('Delivery Address') }}</th>
                    <th>{{ __('Tracking') }}</th>
                    <th>{{ __('Invoice') }}</th>
                    <th>{{ __('Details') }}</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>
</div>
