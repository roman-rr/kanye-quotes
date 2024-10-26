@props([
'text',
'description' => '',
'start' => true
])

<!--begin::Text-->
<div class="p-5 rounded {{ ($start) ? 'text-start bg-gray-300 text-dark':'text-end bg-gray-200 text-dark' }} fw-semibold" data-kt-element="message-text">{{ $text }}</div>
@if(!empty($description))<span class="text-muted fs-7 ms-1 mt-1 d-block">{{ $description }}</span>@endif
<!--end::Text-->
