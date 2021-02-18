<div>
    <button wire:click="decline" class="btn btn-danger btn-round btn-just-icon">
        <i class="material-icons">thumb_down</i>
        <div class="ripple-container"></div>
    </button>
    <div wire:loading>
        @include('component.loading-state')
    </div>
</div>
