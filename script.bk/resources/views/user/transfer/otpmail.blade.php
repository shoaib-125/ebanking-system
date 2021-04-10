@component('mail::message')
# Dear, {{ $content['name'] }}



@foreach($content as $key => $value)
  @if ($key == 'message')
     {{ $value }}
  @else 
    {{ $key }}: {{ $value }}
  @endif
@endforeach

Thanks,
{{ config('app.name') }}
@endcomponent