@props(['message', 'color', 'trigger'])

<div x-data="{ shown: false, timeout: null }"
        x-init="@this.on('{{$trigger}}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
        x-show.transition.out.opacity.duration.1500ms="shown"
        x-transition:leave.opacity.duration.1500ms
        style="display: none;"
        class="text-sm mx-10 text-{{$color}} fw-bold me-6">
                {{ $message }}
</div>