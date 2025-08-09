<section class="section-popular-course tf-spacing-6 pt-0">
    <div class="tf-container">
        <div class="row">
            <div class="col-12">
                <div class="widget-tabs style-small">
                    <div class="heading-section">
                        <h2 class="letter-spacing-1 wow fadeInUp"
                            data-wow-delay="0s">{{__($section->contents['title']) }}</h2>
                        <div class="flex items-center justify-between flex-wrap gap-10 ">
                            <div class="sub fs-15 wow fadeInUp"
                                 data-wow-delay="0.2s">{{__($section->contents['sub_title']) }}</div>
                            <ul class="widget-menu-tab overflow-x-auto wow fadeInUp" data-wow-delay="0.3s">
                                <li class="item-title active" data-id="all">All</li> <!-- Add "All" tab -->
                                @foreach($top_course_categories as $category)
                                    <li class="item-title" data-id="{{ $category->slug }}-{{ $category->id }}">
                                        {{ $category->title }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget-content-tab wow fadeInUp" data-wow-delay="0.4s">
                        <div class="widget-content-inner active">
                            <div class="grid-layout-4 gap40">
                                @foreach($top_course_categories as  $category)
                                    <div class="course-group" data-category="{{ $category->slug }}-{{ $category->id }}">
                                        @if(count($category->activeCourses ) > 0)
                                            @foreach($category->activeCourses as $key => $course)
                                                @include('pak-dev.components.single_course')
                                            @endforeach
                                        @else
                                            @include('frontend.not_found', $data=['title'=> 'course'])
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabs = document.querySelectorAll(".item-title");
        const courseGroups = document.querySelectorAll(".course-group");

        tabs.forEach(tab => {
            tab.addEventListener("click", function () {
                tabs.forEach(t => t.classList.remove("active"));
                this.classList.add("active");
                const selectedCategory = this.getAttribute("data-id");
                courseGroups.forEach(group => {
                    if (selectedCategory === "all" || group.getAttribute("data-category") === selectedCategory) {
                        group.style.display = "block";
                    } else {
                        group.style.display = "none";
                    }
                });
            });
        });
    });
</script>
