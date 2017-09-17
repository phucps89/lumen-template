<h2>Hello Lumen</h2>

@component('mail::button', ['url' => route('home')])
    View home page
@endcomponent


Thanks,<br>
{{ \Illuminate\Support\Facades\App::version() }}
