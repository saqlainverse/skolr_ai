<div class="col-xxl-4 col-xl-6 col-lg-6 col-md-12">
    <div class="payment-box">
        <div class="payment-icon">
            <img src="{{ static_asset('images/payment-icon/mollie.svg') }}" alt="Stripe">
            <span class="title">{{ __('mollie') }}</span>
        </div>

        <div class="payment-settings">
            <div class="payment-settings-btn">
                <a href="#" class="btn btn-md sg-btn-outline-primary" data-bs-toggle="modal" data-bs-target="#mollie"><i
                        class="las la-cog"></i> <span>{{ __('setting') }}</span></a>
            </div>

            <div class="setting-check">
                <input type="checkbox" id="is_mollie_activated" value="setting-status-change/is_mollie_activated"
                       class="status-change" {{ setting('is_mollie_activated') ? 'checked' : '' }}>
                <label for="is_mollie_activated"></label>
            </div>
        </div>
    </div>
</div>
<!-- End Payment box -->
<div class="modal fade" id="mollie" tabindex="-1" aria-labelledby="paymentMethodLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h6 class="sub-title">{{ __('mollie') }} {{ __('configuration') }}</h6>
            <button type="button" class="btn-close modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <form action="{{ route('payment.gateway') }}" method="post" class="form">@csrf
                <div class="row gx-20">
                    <input type="hidden" name="is_modal" class="is_modal" value="0">
                    <input type="hidden" name="payment_method" value="mollie">
                    <div class="col-12">
                        <div class="mb-4">
                            <label class="form-label">{{ __('api_key') }}</label>
                            <input type="text" class="form-control rounded-2" name="mollie_api_key"
                                   placeholder="{{ __('enter_api_key') }}"
                                   value="{{ stringMasking(old('mollie_api_key',setting('mollie_api_key')),'*',3,-3) }}">
                            <div class="nk-block-des text-danger">
                                <p class="mollie_api_key_error error"></p>
                            </div>
                        </div>
                    </div>
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
