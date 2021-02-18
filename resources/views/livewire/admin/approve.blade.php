<div>
    <button wire:click="approve" class="btn btn-primary btn-round btn-just-icon">
        <i class="material-icons">thumb_up</i>
        <div class="ripple-container"></div>
    </button>
    <div wire:loading>
        @include('component.loading-state')
    </div>
</div>
