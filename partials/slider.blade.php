@if(slideshow()->count() > 0)
<div class="slideshow single-slider owl-carousel">
    @foreach(slideshow() as $slide)
    <div class="item">
        <a href="{{ empty($slide->url) ? '#' : filter_link_url($slide->url) }}">
            <img class="img-responsive" src="{{ slide_image_url($slide->gambar) }}" alt="{{ $slide->title }}" />
        </a>
    </div>
    @endforeach
</div>
@endif