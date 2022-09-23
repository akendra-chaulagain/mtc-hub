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



	<div class="partners bg-light text-center">
				<div class="container">
					<div class="row">
                          @if (isset($partners))
                        @foreach ($partners as $partner)
						<div class="col-sm-2">
							<a href="#">
								<img src="/dirosha/{{ $partner->banner_image }}" alt="">
							</a>
						</div>
                         @endforeach
                    @endif

						
					</div>
				</div>
			</div>
