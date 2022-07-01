@component('mail::message')
# Hello There

Thanks for your writing us, we will get back to you as soon as possibile 

name: {{$message->full_name}} <br>
Email: {{$message->email}}
Message: {{$message->message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
