@section('title')
    {{ trans('message.products') }}
@endsection
<div style="margin-top:3%;"class="project-area project-area__2 pt-125">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 text-center">
                <div class="section-header mb-65">
                    <h4 class="sub-heading sub-heading__2 mb-15">
                        <span><img src="{{ asset('frontend/assets/images/shape/heading-shape-3.png') }}" class="mr-5"
                                alt="images"></span>
                        {{ trans('message.products') }}
                        <span><img src="{{ asset('frontend/assets/images/shape/heading-shape-4.png') }}" class=" ml-5"
                                alt="images"></span>
                    </h4>
                    <h2 class="section-title section-title__2">{{ trans('message.our_products') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row project-row mt-none-30">
            @foreach ($products as $product)
                <div class="col-xl-4 col-lg-6 col-md-6 d-flex mt-30">
                    <div class="project-item">
                        <div class="project-item__thumb project-item__thumb--big">
                            @foreach ($product->images as $img)
                                <img src="{{ asset('images/'.$img->images) }}" alt="{{ $product->title }}">
                                @break
                            @endforeach
                        </div>
                        <div class="project-item__hover" data-overlay="dark" data-opacity="9">
                            <a href="{{ route('show',$product->slug) }}" class="project-item__link">
                                <i class="far fa-arrow-right"></i>
                            </a>
                            <div class="project-item__content">
                                <h5 class="project-item__subtitle"><span>//</span> {{ $product->title }}</h5>
                                <h4 class="project-item__title">{{ $product->title }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $products->links() }}
    </div>
</div>


