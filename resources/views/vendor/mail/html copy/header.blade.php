<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('/frontend/assets4/img/logo_plesiran_new_black1.png') }}" class="logo" alt="Pesona Plesiran Indonesia">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
