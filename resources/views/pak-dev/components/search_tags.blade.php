<section class="section-search-tags tf-spacing-11">
    <div class="tf-container">
        <div class="row">
            <div class="col-12">
                <div class="heading-section text-center">
                    <h2 class="font-outfit wow fadeInUp" data-wow-delay="0.1s">Advance Your Career..</h2>
                    <div class="sub fs-15 wow fadeInUp" data-wow-delay="0.2s">Upskill in business analytics,.</div>
                </div>
                <div class="tags-list style3 wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="tag-list">
                        @forelse($tags as $tag)
                        <li class="tag-list-item"><a href="#">{{ $tag->title }}</a></li>
                        @empty
                            <tr><td colspan="4">No tags found.</td></tr>
                        @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
