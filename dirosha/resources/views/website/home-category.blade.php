@php

$products = App\Models\Navigation::find($project_heading->parent_page_id);
$products_data = App\Models\Navigation::find($products->parent_page_id);
@endphp





<section class="section-wrap">
    <div class="container">
        <div class="title-row">
            <h2 class="section-title">Discover Our Projects</h2>
        </div>

        <!-- Filter -->
        <div class="masonry-filter">
            <a href="#" class="filter active" data-filter="*">All</a>
            @foreach ($products_data->childs as $project_headingitem)
                <a href="#" class="filter "
                    data-filter=".{{ $project_headingitem->nav_name }}">{{ $project_headingitem->caption }}</a>
            @endforeach
        </div> <!-- end filter -->

        <div class="row masonry-grid">

            @foreach ($products_data->childs as $project_headingitem)
                @foreach ($project_headingitem->childs as $products_datatem)
                    <div
                        class="masonry-item col-xl-3 col-lg-4 col-md-6 project hover-trigger  {{ $project_headingitem->nav_name }}">
                        <div class="project__container">
                            <div class="project__img-holder">
                                <a href="{{ route('single_news', $products_datatem->nav_name) }}">
                                    <img src="{{ $products_datatem->banner_image }}" alt=""
                                        class="project__img">
                                    <div class="hover-overlay">
                                        <div class="project__description">
                                            <h3 class="project__title">{{ $products_datatem->caption ?? ' ' }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach



        </div>
    </div>
</section> <!-- end portfolio -->
