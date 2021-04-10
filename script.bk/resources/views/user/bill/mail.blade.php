@component('mail::message')
# Dear, {{ $content['name'] }}

{{ $content['message'] }}

Thanks,
{{ config('app.name') }}
@endcomponent