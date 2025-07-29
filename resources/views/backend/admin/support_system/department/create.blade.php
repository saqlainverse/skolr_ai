<form action="{{ route('departments.store') }}" method="POST" class="form">@csrf
    <div class="row gx-20 add-coupon">
        <input type="hidden" class="is_modal" value="0"/>
        <div class="col-lg-12">
            <div class="mb-4">
                <label for="title" class="form-label">{{ __('title') }}</label>
                <input type="text" class="form-control rounded-2" id="title" name="title"
                       placeholder="{{ __('title') }}">
                <div class="nk-block-des text-danger">
                    <p class="title_error error"></p>
                </div>
            </div>
        </div>
        <!-- End Coupon Title -->
        <div class="d-flex gap-12 sandbox_mode_div">
            <input type="hidden" name="status" value="1">
            <label class="form-label"
                   for="status">{{ __('status') }}</label>
            <div class="setting-check">
                <input type="checkbox" value="1" id="status"
                       class="sandbox_mode" checked>
                <label for="status"></label>
            </div>
        </div>
        <div class="d-flex justify-content-end align-items-center mt-30">
            <button type="submit" class="btn sg-btn-primary">{{__('submit') }}</button>
            @include('backend.common.loading-btn',['class' => 'btn sg-btn-primary'])
        </div>
    </div>
</form>
