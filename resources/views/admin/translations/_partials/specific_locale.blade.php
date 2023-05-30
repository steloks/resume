@extends('layouts.contentLayoutMaster')

@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{ route('admin.Translation::index') }}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>{{ __('To all translations') }}</span>
            </a>
        </div>
    </div>
    <div class="page-header border-bottom-0 dfa-trnsl-btn">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex w-100 justify-content-between">
                <div class="navbar navbar-dark navbar-expand-md custom-css-sticky d-flex justify-content-between py-2">
                    <div>
                        <h4>
                            <i class="icon-sphere mr-1"></i>
                            <span class="font-weight-semibold">
                        {{ !empty($pageHeading) ? $pageHeading : '' }}
                    </span>
                        </h4>
                    </div>
                    <div class="loader">
                        <div class="loading">
                        </div>
                    </div>
                    <div>
                        <a href="javascript:;"
                           class="btn btn-dark border-white custom-js-translation"> {{ __('Translate') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">

        <div class="card">
            <table class="table table-bordered table-hover table-checkable custom-table-class">
                <thead>
                <tr>
                    <th>{{ __('Base translation') }}</th>
                    <th class="w-50">{{ __('Translated') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($localeContents as $key => $translation)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>
                            <input class="form-control" type="text" name="translated"
                                   value="{{ !empty($translation) ? $translation : '' }}"
                                   data-url="{{ route('admin.Translation::saveTranslation') }}"
                                   data-key="{{ $key }}" data-locale="{{ $localeFromInput }}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('page-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            saveTranslations();

            function saveTranslations() {
                $(document).on('click', '.custom-js-translation', function () {
                    $('.loader').addClass('block').show();
                    let translations = {},
                        key = '',
                        locale = '',
                        url = '';
                    $(this).parents('.content-wrapper').find('tbody input').each(function () {
                        key = $(this).data('key');
                        locale = $(this).data('locale');
                        url = $(this).data('url');
                        translations[key] = $(this).val();
                    });
                    console.log(translations)
                    $.ajax({
                        method: 'POST',
                        url: url,
                        dataType: 'json',
                        data: {
                            translationsArr: translations,
                            locale: locale
                        },
                        beforeSend: function beforeSend(xhr, type) {
                            if (!type.crossDomain) {
                                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                            }
                        },
                        success: function (data) {
                            if (data.success === true) {
                                window.location.reload();
                                if (data.translationMsg.length !== 0) {
                                    localStorage.setItem('translationMsg', data.translationMsg);
                                }
                            }
                        }
                    })
                })
            };
        })
    </script>
@endsection
