@aware([
    'progress',
    'isPostTable',
    'title' => '',
    'description' => '',
    'current' => '',
    'max' => '',
    'remaining' => ''
])

<!--begin::Progress-->
@if((!empty($title)) || (!empty($description)))
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-between w-100 fs-4 fw-bold mb-3">
            @if(!empty($remaining))<span>{{ $title }}</span>@endif
            @if(!empty($description))
                <span>
                    {{ __($description, [
                            'current' => $current,
                            'max' => $max
                        ]) }}
                </span>
            @endif
        </div>
        @endif

        {{-- Note: PHP-JS error with converting string to int.
            Grab Progress from JS, in parent level of templates. 
            ${progress} available after rendering table data with ${progress} JS template interpolation.
            Server Side PHP doesn't know progress variable on render component, because data not fetched yet.
        --}} 
        @if ($isPostTable)
           <div class="progress h-8px bg-${progress < 100 ? row['queue_failed'] ? 'danger' : 'primary':'success'} ${progress < 100 ? 'bg-opacity-50':''} rounded mb-3">
                <div class="progress-bar ${progress < 100 && !row['queue_failed'] ? 'progress-bar-striped progress-bar-animated' : '' } bg-${progress < 100 ? row['queue_failed'] ? 'danger' : 'primary':'success'} rounded h-8px" role="progressbar" style="width:${!progress ? '8' : progress}%;" aria-valuenow="${progress}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        @else
            <div class="progress h-8px bg-${ (progress < 60) ? 'success':((progress < 80) ? 'warning':'danger') } bg-opacity-50 rounded mb-3">
                <div class="progress-bar bg-${ (progress < 60) ? 'success':((progress < 80) ? 'warning':'danger')}} rounded h-8px" role="progressbar" style="width:${progress}%;" aria-valuenow="${progress}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        @endif
        
        @if(!empty($remaining))<div class="fw-semibold text-gray-600">{{ $remaining }}</div>@endif
        @if((!empty($title)) || (!empty($description)))
    </div>
@endif
<!--end::Progress-->

