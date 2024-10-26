@unless($breadcrumbs->isEmpty())
    <div class="badge badge-lg badge-light-dark">
        <div class="d-flex align-items-center flex-wrap">
            <x-icon name="abstract/abs027.svg" class="svg-icon-2 svg-icon-dark me-3" />
            <!--begin::Breadcrumb-->
                @foreach($breadcrumbs as $breadcrumb)
                    <!--begin::Item-->
                    @if(!is_null($breadcrumb->url) && !$loop->last)
                        <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    @else
                        {{ $breadcrumb->title }}
                    @endif
                    <!--end::Item-->
                    @if(!$loop->last)
                        <!--begin::Item-->
                            <x-icon name="arrows/arr071.svg" class="svg-icon-2 svg-icon-primary mx-1" />
                        <!--end::Item-->
                    @endif
                @endforeach
            <!--end::Breadcrumb-->
        </div>
    </div>
@endunless
