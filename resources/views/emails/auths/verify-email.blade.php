@component('mail::message')

Hi <strong>{{ $userFname }},</strong>

Kindly click the button below to verify this email address for your aika account.
This will give you opportunities to make use of other features that requires email.
@component('mail::button', ['url' => $url, 'color' => 'red'])
    Verify Now
@endcomponent

<br/><br/>
Thanks,
{{ config('app.name') }} Team

@endcomponent
