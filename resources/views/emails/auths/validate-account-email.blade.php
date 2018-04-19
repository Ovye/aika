@component('mail::message')

Hi <strong>{{ $userFname }},</strong>

# Congratulations!

Your account email is now verified.
Click the button below to login with this email or your phone number.
@component('mail::button', ['url' => $url, 'color' => 'red'])
    Login Now
@endcomponent

<br/><br/>
Thanks,
{{ config('app.name') }} Team

@endcomponent
