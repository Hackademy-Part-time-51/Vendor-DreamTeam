<div>
    <button class="btn btn-base" wire:click="toggleFavorite">
        @if ($favorites)
            <i class="bi bi-heart-fill"></i>
        @else
            <i class="bi bi-heart"></i>
        @endif
    </button>
</div>
