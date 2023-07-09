@if(session()->has('message'))
<div x-data="{show: true}" x-show="show" x-init="setTimout(()=>show=false,3000)" class="fixed top-0 left bg-laravel text-white px-48 py-3 left-1/2 transform -translate-x-1/2">

    <p >{{session('message')}}</p>
</div>
@endif