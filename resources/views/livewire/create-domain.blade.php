<?php

use App\Models\Tag;
use App\Models\Domain;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {

	#[Validate('required')]
	public $name = '';

	public $description = '';

	public $tags = [];

	public $selectedTags = [];

	public function mount()
	{
		$this->tags = Tag::all(); // Get all tags to populate the dropdown
	}

	public function save()
	{
		$this->validate();

		// Create a new domain
		$domain = Domain::create([
			'name' => $this->name,
			'description' => $this->description
		]);

		// Attach the selected tags to the domain
		$domain->tags()->sync($this->selectedTags);

		$this->reset(['name', 'description', 'selectedTags']);

		$this->dispatch('domain-created');
	}

};
?>

<div>
	<form wire:submit.prevent="save">
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
		<div class="mb-4">
			<div class="flex gap-6">
				<div>
					<div>Tags</div>
					<select wire:model="selectedTags" multiple class="min-w-40">
						@foreach($tags as $tag)
							<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>
				</div>
				<div>
					<x-secondary-button class="mt-6" x-data=""
						x-on:click.prevent="$dispatch('open-modal', 'create-tag')">
						Create Tag
					</x-secondary-button>
				</div>
			</div>
		</div>
		<div>
			<x-primary-button>
				Create Domain
			</x-primary-button>
		</div>
	</form>

	<x-modal name="create-tag">
		<div class="p-4">
			<livewire:create-tag />
		</div>
	</x-modal>
</div>