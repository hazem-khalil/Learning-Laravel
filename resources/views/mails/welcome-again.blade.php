@component('mail::message')
# Introduction

The body of your message.
-One
-Two
-Three


@component('mail::button', ['url' => 'www.facebook.com'])
Browse From Here!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
