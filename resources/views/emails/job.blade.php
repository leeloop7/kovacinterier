@component('mail::message')

You have a receieved a new job application through your job form.

**Position:** {{ $data['subject'] }}<br><br>
**Name:** {{ $data['first-name'] }} {{ $data['last-name'] }}<br><br>
**Email:** {{ $data['email'] }}<br><br>
**Phone:** {{ $data['phone'] }}<br><br>

@endcomponent
