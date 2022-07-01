@component('mail::message')
# Introduction

you recieved a new message da {{$message->full_name}}
Subject: {{$message->subject}}
Message: {{$message->message}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
