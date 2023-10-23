@if (session()->has('message')) 

<div
x-data="{show: true}"
x-init="setTimeout(() => show = false, 30000)"
x-show="show"
class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-black text-white px-48 py-3 z-99999999999999999999999999 bg-opacity-100"
>
    <p>{{session('message')}}</p>
</div>

@endif 