@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="flash-message">
        <p>{{ session('message') }}</p>
    </div>
@endif
