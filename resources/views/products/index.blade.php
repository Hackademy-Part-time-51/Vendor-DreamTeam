<x-layout>
    <x-mininavbar/>
    @if (session('status'))
    <div class="alert alert-success text-center">
        {{ session('status') }}
    </div>
    @endif
    <div class="container-fluid">

        @livewire('products.index', compact('products', 'categories'))
    </div>
</x-layout>