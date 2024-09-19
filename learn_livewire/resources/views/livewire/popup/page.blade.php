<div>
    <h1>{{$is_show}}</h1>

    @if ($is_show)
        <livewire:popup.popup />
    @endif
    <button wire:click="showPoppop(true)">Show Pop up</button>
</div>
