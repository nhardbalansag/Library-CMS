<div>
    <button wire:click="delete" class="btn btn-danger btn-round btn-just-icon">
        <i class="material-icons">delete</i>
        <div class="ripple-container"></div>
    </button>
    <div wire:loading>
        @include('component.loading-state')
    </div>
</div>
