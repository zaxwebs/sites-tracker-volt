<?php

use App\Models\Domain;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {

	#[Validate('required')]
	public $name = '';

	public $description = '';

	public function save()
	{
		$this->validate();
		// Create a new domain
		$domain = Domain::create([
			'name' => $this->name,
			'description' => $this->description
		]);
	}

}; ?>
<form wire:submit="save">
	<div class="mb-4">
		<div>Name</div>
		<x-text-input type="text" wire:model.blur="name" />
		@error('name')
			<div class="text-red-500">{{ $message }}</div>
		@enderror
	</div>
	<div class="mb-4">
		<div>Description</div>
		<x-text-input type="text" wire:model="description" />
	</div>
	<div>
		<x-primary-button>
			{{ __('Create Domain') }}
		</x-primary-button>
	</div>
</form>