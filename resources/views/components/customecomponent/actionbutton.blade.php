 <button class="{{ $class }} cursor-pointer" wire:click="{{ $action }}({{ $id }})">
     {{ $button ?? 'Action' }}
 </button>
