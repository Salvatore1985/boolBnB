@component('mail::message')
<p><strong>Apartment:</strong> {{ $apartment_id }}</p>
<p><strong>Name:</strong> {{ $name }}</p>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Message:</strong> {{ $email_content }} </p>
@endcomponent