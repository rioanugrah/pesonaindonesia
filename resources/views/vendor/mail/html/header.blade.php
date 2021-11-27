<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('logo_perusahaan/logo_cv.png') }}" class="logo" alt="Pesona Plesiran Indonesia">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
