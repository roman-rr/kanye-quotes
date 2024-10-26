<div class="col-xl-{{ $columnSize }}">
    <div class="card card-flush h-xl-100">
        <div class="card-header ">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">Quote</span>
            </h3>
            <!--begin::Toolbar-->
            <div class="card-toolbar">   
                <button wire:click="refreshQuote" class="btn btn-sm btn-icon-primary btn-light-primary">
                    <x-icon name="general/gen002.svg" class="svg-icon-2 svg-icon-primary mx-1" />
                </button>             
            </div>
            <!--end::Toolbar-->
        </div>
        <div class="card-body">
            <p>{{ $quote }}</p>
        </div>
    </div>
</div>
