@if (Auth::guard('web')->check())
    <p class="text-success h1">You are login in as a USER</p>
@else
    <p class="text-danger h1">You are log out as a USER</p>
@endif

@if (Auth::guard('admin')->check())
    <p class="text-success h1">You are login in as a ADMIN</p>
@else
    <p class="text-danger h1">You are log out as a ADMIN</p>
@endif

@if (Auth::guard('parner')->check())
    <p class="text-success h1">You are login in as a PARNER</p>
@else
    <p class="text-danger h1">You are log out as a PARNER</p>
@endif
