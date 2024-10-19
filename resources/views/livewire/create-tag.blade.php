<?php

use App\Models\Tag;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {

	#[Validate('required')]
	public $name = '';

	public function save()
	{
		$this->validate();

		// Create a new tag
		$tag = Tag::create([
			'name' => $this->name,
		]);

		$this->reset();
	}
}; ?>

<div>
	<form wire:submit="save">
		<div class="mb-4">
			<div>Name</div>
			<x-text-input type="text" wire:model.blur="name" />
			@error('name')
				<div class="text-red-500">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<x-primary-button>
				{{ __('Create Tag') }}
			</x-primary-button>
		</div>
	</form>
</div>