<x-layout>
    <x-mininavbar></x-mininavbar>
    @if (session()->has('message'))
    <div class="alert alert-success text-center shadow rounded w-50">
        {{session('message')}}
    </div>
    @endif
    <div class=" p-3">
        @livewire('products.show-limited-products')
    </div>
</x-layout>