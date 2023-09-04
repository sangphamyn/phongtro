@if (Session::has('error'))
    <span class="text-sm text-red-600">{{ Session::get('error') }}</span>
@endif

@if (Session::has('success'))
    <span class="text-sm text-green-600">{{ Session::get('success') }}</span>
@endif
