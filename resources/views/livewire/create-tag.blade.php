<?php

use App\Models\Tag;
use Livewire\Volt\Component;
use Masmerise\Toaster\Toaster;
use Livewire\Attributes\Validate;

new class extends Component {

	#[Validate('required|unique:tags,name')]
	public $name = '';

	public function save()
	{
		$this->validate();

		// Create a new tag
		$tag = Tag::create([
			'name' => $this->name,
		]);

		$this->reset();

		$this->dispatch('tag-created', id: $tag->id);
		Toaster::success('Tag created!');
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