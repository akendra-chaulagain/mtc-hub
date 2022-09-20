@php
if (
    app\Models\Navigation::query()
        ->where('nav_category', 'Home')
        ->where('nav_name', 'LIKE', '%partner%')
        ->where('page_type', 'Group')
        ->latest()
        ->first() != null
) {
    $partners_id = app\Models\Navigation::query()
        ->where('nav_category', 'Home')
        ->where('nav_name', 'LIKE', '%partner%')
        ->where('page_type', 'Group')
        ->latest()
        ->first()->id;
    $partners = app\Models\Navigation::query()
        ->where('parent_page_id', $partners_id)
        ->latest()
        ->get();
} else {
    $partners = null;
}

@endphp


<section class="company-logos-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="company-logos-text">
                    <h3 class="title">{{ $section_heading->caption ?? ' ' }}</h3>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    @if (isset($partners))
                        @foreach ($partners as $partner)
                            <div class="col-sm-4">
                                <div class="logo-item mt-15">
                                    <img src="{{ $partner->banner_image }}" alt="partner_image">
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
