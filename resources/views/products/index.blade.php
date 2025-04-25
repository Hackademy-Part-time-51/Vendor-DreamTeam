<x-layout>
    <x-mininavbar/>
    @if (session('status'))
    <div class="alert alert-success text-center">
        {{ session('status') }}
    </div>
    @endif
    @livewire('products.index', compact('products', 'categories'))
</x-layout>