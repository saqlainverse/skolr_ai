<section class="section-become-instructor tf-spacing-4 pb-0">
    <div class="tf-container">
        <div class="row justify-center">
            <div class="col-md-5">
                <div class="image-left">
                    <img class="lazyload" data-src="{{ static_asset('pak-dev/images/section/become-instructor.jpg') }}"
                         src="{{ static_asset('pak-dev/images/section/become-instructor.jpg') }}" alt="">
                </div>
            </div>
            @isset($section->contents['title'])
                <div class="col-md-5">
                    <div class="content-right">
                        <div class="content-user wow fadeInUp" data-wow-delay="0s">
                            <div class="box-agent style2">
                                <ul class="agent-img-list">
                                    <li class="agent-img-item">
                                        <img class=" ls-is-cached lazyloaded"
                                             data-src="{{ static_asset('pak-dev/images/avatar/user-1.png') }}"
                                             src="{{ static_asset('pak-dev/images/avatar/user-1.png') }}" alt="">
                                    </li>
                                    <li class="agent-img-item">
                                        <img class=" ls-is-cached lazyloaded"
                                             data-src="{{ static_asset('pak-dev/images/avatar/user-2.png') }}"
                                             src="{{ static_asset('pak-dev/images/avatar/user-2.png') }}" alt="">
                                    </li>
                                    <li class="agent-img-item">
                                        <img class=" ls-is-cached lazyloaded"
                                             data-src="{{ static_asset('pak-dev/images/avatar/user-3.png') }}"
                                             src="{{ static_asset('pak-dev/images/avatar/user-3.png') }}" alt="">
                                    </li>
                                    <li class="agent-img-item">
                                        <p>1M+</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h2 class="fw-7 letter-spacing-1 wow fadeInUp"
                            data-wow-delay="0.1s">{{__(@$section->contents['title']) }}</h2>
                        <p class="fz-15 wow fadeInUp" data-wow-delay="0.2s">{{__(@$section->contents['sub_title']) }}
                            .</p>
                        <a href="#" class="tf-btn wow fadeInUp" data-wow-delay="0.3s">{{__('become_instructor') }}
                            <img src="{{ getFileLink('615x623', $section->image_1) }}" alt="Instructor image">
                        </a>
                    </div>
                </div>
            @endisset
        </div>
    </div>
</section>
