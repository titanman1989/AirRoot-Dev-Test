@component('mail::message')



Dear {{ $data['name'] }} <br>
Your Photo storage is almost full. You have {{ round($data['size'] / (1000 * 1024), 2)}}MB  remaining of 100 MB total storage.
Your Photo storage is used for Photo and to back up your photos, you need to upgrade your Photo storage plan or reduce the amount of storage you are using.
The Photo Team

@component('mail::button', ['url' => $data['url']])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
