@component('mail::message')
# Hello,

### You have a new pending quiz, waiting on your dashboard. Please login to take the quiz.

Regards,<br>
{{ config('app.name') }}
@endcomponent
