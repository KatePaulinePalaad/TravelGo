@component('mail::message')
<h1 style="text-align:center;">Greetings!!!</h1>

Thank you for booking your travel destination at {{ config('app.name') }}
Here is the list of your Booking:
@component('mail::table')
| Place            | From       | To          | Days Stay| Adult     | Children     |
|:----------------:|:----------:|:-----------:|:--------:|:---------:|:------------:|
| {{$location}}    |{{$checkin}}|{{$checkout}}|{{$stay}} |{{$adult}} |{{$children}} |
| Total: {{$price}}|
@endcomponent



<h4 style="text-align: center;">Have a safe fligth and Enjoy your trip</h4><br>
Thank you From:<br>
<h4 style="color: #029D9D;">{{ config('app.name') }}</h4>
@endcomponent
