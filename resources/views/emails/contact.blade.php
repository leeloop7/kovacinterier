@component('mail::message')

You have a receieved a new contact through your contact form.

**Name:**
{{ $data['first-name'] }} {{ $data['last-name'] }}<br><br>
**Email:** {{ $data['email'] }}<br><br>
**Company:** {{ $data['company'] }}<br><br>
@if($data['phone'])
**Phone:** {{ $data['phone'] }}<br><br>
@endif
**How can we help:**<br>
{{ $data['how-can-we-help'] }}<br><br>
**How did you hear about us:**<br>
{{ $data['how-did-you-hear-about-us'] }}
@endcomponent
