@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Home')
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    @if(checkAccess('Home','view') && checkAccess('Home','show_module'))
<div class="row my-2">
  <div class="col-12 col-lg-6">
    @include('admin.home-notification-left')
  </div>
  <div class="col-12 col-lg-6">
    @include('admin.home-notification-right')
  </div>
</div>

    @endif
@endsection

@section('page-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.js-notification-check', function () {
                let el = $(this);
            $.ajax({
                    method: 'POST',
                    url: el.data('url'),
                    dataType: 'json',
                    beforeSend: function beforeSend(xhr, type) {
                        if (!type.crossDomain) {
                            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                        }
                    },
                    success: function (response) {
                        if (response.success === true) {
                            el.remove()
                            let bellEl = $('.to-remove-notification-when-checked'),
                                bellCount = parseInt(bellEl.text());
                            bellEl.text(bellCount - 1)
                        }
                    }
                });

            })
        })
    </script>
@endsection
