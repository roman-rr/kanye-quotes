@props([
'campaign',
'title',
'active_page',
'page'
])

<!--begin::Nav item-->
<li class="nav-item">
    <a class="nav-link text-active-primary py-5 me-6 @if($page == $active_page) active @endif" href="campaigns/{{ $campaign->id .'/'. $page }}">{{ $title }}</a>
</li>
<!--end::Nav item-->
