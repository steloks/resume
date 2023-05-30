@extends('layouts.contentLayoutMaster')

@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{ route('admin.Translation::index') }}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>{{ __('To all translations') }}</span>
            </a>
        </div>
    </div>
    <div class="page-header border-bottom-0">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex w-100 justify-content-between">
                <h4>
                    <i class="icon-sphere mr-1"></i>
                    <span class="font-weight-semibold">
                        {{ !empty($pageHeading) ? $pageHeading : '' }}
                    </span>
                </h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <form action="{{ route('admin.Translation::searchByLocale') }}" method="POST">
            @csrf

            <div class="card">
                <div class="form-group row">
                    <div class="col-md-8">
                        <label class="control-label" for="locale">{{ __('Locale') }}</label>
                        <select class="form-control select-search select2-hidden-accessible" id="locale" name="locale">
                            <option value="" disabled="">{{ __('Base translation') }}</option>
                            @foreach ($localesFromFile as $localeFromFile)
                                <option value="{{ $localeFromFile }}"
                                        {{ (!empty($localeFromFile) && old('locale', $localeFromInput ?? '') == $localeFromFile) ? 'selected' : '' }}>
                                    {{ mb_strtoupper($localeFromFile) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 d-flex">
                        <div class="text-center align-content-between mt-auto">
                            <button type="submit"
                                    class="btn btn-primary border-white  ">{{ __('Change locale') }}</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

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
                            <input class="custom-js-translation form-control" type="text" name="translated"
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
    </script>
@endsection
