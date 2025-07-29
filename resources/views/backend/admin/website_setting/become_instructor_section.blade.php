@extends('backend.layouts.master')
@section('title', __('become_an_instructor_section'))
@section('content')
    <section class="oftions">
        <div class="container-fluid">
            <div class="row">
                @include('backend.admin.website_setting.sidebar_component')
                <div class="col-xxl-9 col-lg-8 col-md-8">
                    <h3 class="section-title">{{ __('become_an_instructor_section') }}</h3>
                    <div class="bg-white redious-border p-20 p-sm-30">
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="r" value="{{ url()->current() }}" class="r">
                                    <div class="mb-4">
                                        <label for="lang" class="form-label">{{__('language') }}</label>
                                        <select id="lang"
                                                class="form-select form-select-lg mb-3 with_search" name="lang">
                                            <option value="">{{__('select_language') }}</option>
                                            @foreach($languages as $language)
                                                <option
                                                    value="{{ $language->locale }}" {{ $lang == $language->locale ? 'selected' : '' }}>{{ $language->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="nk-block-des text-danger">
                                            <p class="lang_error error">{{ $errors->first('lang') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{route('website.instructor_content')}}" method="POST" class="form">@csrf
                            <div class="row gx-20">
                                <input type="hidden" value="0" class="is_modal" name="is_modal">
                                <input type="hidden" value="{{ $lang }}" name="site_lang">
                                <!-- End Select Field without search -->
                                <div class="col-12 col-lg-12">
                                    <div class="mb-4">
                                        <label for="become_instructor_title" class="form-label">{{ __('title') }}</label>
                                        <input type="text" class="form-control rounded-2" id="cta_title"
                                               placeholder="{{ __('enter_title') }}" name="become_instructor_title" value="{{ setting('become_instructor_title',$lang) }}">
                                        <div class="nk-block-des text-danger">
                                            <p class="cta_title_error error">{{ $errors->first('lang') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Title -->

                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <label for="become_instructor_description" class="form-label">{{ __('become_instructor_description') }}</label>
                                        <textarea class="form-control" id="become_instructor_description"
                                                  name="become_instructor_description" placeholder="{{ __('become_instructor_description') }}">{{ setting('become_instructor_description',$lang) }}</textarea>
                                        <div class="nk-block-des text-danger">
                                            <p class="cta_description_error error">{{ $errors->first('lang') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End  Description -->
                                <div class="col-lg-12 input_file_div mb-3">
                                    <div class="mb-3">
                                        <label for="become_instructor_image" class="form-label mb-1">{{ __('image') }} (607x602)</label>
                                        <label for="become_instructor_image" class="file-upload-text">
                                            <p></p>
                                            <span class="file-btn">{{ __('choose_file') }}</span>
                                        </label>
                                        <input class="d-none file_picker" type="file" name="become_instructor_image" id="become_instructor_image">
                                    </div>
                                    <div class="selected-files d-flex flex-wrap gap-20">
                                        <div class="selected-files-item">
                                            <img class="selected-img" src="{{  getFileLink('80x80',setting('become_instructor_image')) }}" alt="favicon">
                                        </div>
                                    </div>
                                </div>
                                <!-- End cta Image -->

                                <div class="d-flex gap-12 sandbox_mode_div mb-4">
                                    <input type="hidden" name="become_instructor_status" value="{{ setting('become_instructor_status') == 0 ? 0 : 1 }}">
                                    <label class="form-label"
                                           for="become_instructor_status">{{ __('status') }}</label>
                                    <div class="setting-check">
                                        <input type="checkbox" value="1" id="become_instructor_status"
                                               class="sandbox_mode" {{ setting('become_instructor_status') == 0 ? '' : 'checked' }}>
                                        <label for="become_instructor_status"></label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-start align-items-center mt-30">
                                    <button type="submit" class="btn sg-btn-primary">{{ __('update') }}</button>
                                    @include('backend.common.loading-btn',['class' => 'btn sg-btn-primary'])
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('backend.common.gallery-modal')
@endsection
@push('js')
    <script src="{{ static_asset('admin/js/media.js') }}"></script>
@endpush
@push('css_asset')
    <link rel="stylesheet" href="{{ static_asset('admin/css/dropzone.min.css') }}">
@endpush
@push('js_asset')
    <!--====== media.js ======-->
    <script src="{{ static_asset('admin/js/dropzone.min.js') }}"></script>
@endpush
