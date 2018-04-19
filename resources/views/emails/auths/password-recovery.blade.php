@component('mail::message')

Hi <strong>{{ $name }},</strong>

You did requested to change your aika account password.
Click the button below to continue.
@component('mail::button', ['url' => $url, 'color' => 'red'])
    Change Password
@endcomponent

<br/>

_Please ignore this message if you didn't request for password recovery._

<br/><br/>
Thanks,<br/>
{{ config('app.name') }} Team

@endcomponent
