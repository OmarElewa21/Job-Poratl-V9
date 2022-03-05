@component('mail::message')
# Hello,

### You have a new pending quiz, waiting on your [dashboard]({{env('APP_URL') . '/users/candidate-login'}}). Please login to take the quiz.

Regards,<br>
{{ config('app.name') }}
@endcomponent
