<div class="col-xxl-4 col-xl-6 col-lg-6 col-md-12">
    <div class="payment-box">
        <div class="payment-icon">
            <img src="{{ static_asset('images/payment-icon/aamarpay.svg') }}" alt="AAmarpay">
            <span class="title">{{ __('aamarpay') }}</span>
        </div>

        <div class="payment-settings">
            <div class="payment-settings-btn">
                <a href="#" class="btn btn-md sg-btn-outline-primary" data-bs-toggle="modal" data-bs-target="#aamarpay"
                ><i class="las la-cog"></i> <span>{{ __('setting') }}</span></a>
            </div>

            <div class="setting-check">
                <input type="checkbox" id="checkbox2" value="setting-status-change/is_aamarpay_activated" class="status-change" {{ setting('is_aamarpay_activated') ? 'checked' : '' }}>
                <label for="checkbox2"></label>
            </div>
        </div>
    </div>
</div>
<!-- End Payment box -->
<div class="modal fade" id="aamarpay" tabindex="-1" aria-labelledby="paymentMethodLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h6 class="sub-title">{{ __('aamarpay') }} {{ __('configuration') }}</h6>
            <button type="button" class="btn-close modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <form action="{{ route('payment.gateway') }}" method="post" class="form">@csrf
                <div class="row gx-20">
                    <input type="hidden" name="is_modal" class="is_modal" value="0">
                    <input type="hidden" name="payment_method" value="aamarpay">
                    <div class="col-12">
                        <div class="d-flex gap-12 sandbox_mode_div mb-4">
                            <input type="hidden" name="is_amarpay_sandbox_mode_activated" value="{{ setting('is_amarpay_sandbox_mode_activated') == 1 ? 1 : 0 }}">
                            <label class="form-label" for="is_amarpay_sandbox_mode_activated">{{ __('sandbox_mode') }}</label>
                            <div class="setting-check">
                                <input type="checkbox" value="1" id="is_amarpay_sandbox_mode_activated" class="sandbox_mode" {{ setting('is_amarpay_sandbox_mode_activated') == 1 ? 'checked' : '' }}>
                                <label for="is_amarpay_sandbox_mode_activated"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-4">
                            <label class="form-label">{{ __('store_id') }}</label>
                            <input type="text" class="form-control rounded-2" name="aamrapay_store_id" placeholder="{{ __('enter_store_id') }}" value="{{ stringMasking(old('aamrapay_store_id',setting('aamrapay_store_id')),'*',3,-3) }}">
                            <div class="nk-block-des text-danger">
                                <p class="amrapay_store_id_error error"></p>
                            </div>
                        </div>
                    </div>
                    <!-- End MarChant ID -->

                    <div class="col-12">
                        <div class="mb-4">
                            <label for="marChantKey" class="form-label">{{ __('signature_key') }}</label>
                            <input type="text" class="form-control rounded-2" name="aamarpay_signature_key" id="marChantKey" placeholder="{{ __('enter_signature_key') }}" value="{{ stringMasking(old('aamarpay_signature_key',setting('aamarpay_signature_key')),'*',3,-3) }}">
                            <div class="nk-block-des text-danger">
                                <p class="amarpay_signature_key_error error"></p>
                            </div>
                        </div>
                    </div>
                    <!-- End MarChant Key -->
                </div>
                <!-- END Permissions Tab====== -->
                <div class="d-flex justify-content-end align-items-center mt-30">
                    <button type="submit" class="btn sg-btn-primary">{{ __('save') }}</button>
                    @include('backend.common.loading-btn',['class' => 'btn sg-btn-primary'])
                </div>
            </form>
        </div>
    </div>
</div>
