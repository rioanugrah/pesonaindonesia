@component('mail::message')
# {{ $details['title'] }}

{{-- @if ($details['nama_pembayaran'] != null)
{{ $details['nama_pembayaran'] }}
@endif --}}

{{-- {{ $details['bukti_pembayaran'] }} --}}
{{-- The body of your message. --}}

@if ($details['body'] != null)
{{ $details['body'] }}
@endif

@if ($details['bukti_pembayaran'] != null)
@component('mail::button', ['url' => $details['bukti_pembayaran']])
Upload Bukti Pembayaran
@endcomponent
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
