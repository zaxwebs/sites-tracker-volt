<?php

use App\Models\Tag;
use Livewire\Volt\Component;

new class extends Component {

	public $tags;

	public function mount()
	{
		$this->tags = Tag::all();
	}
	
}; ?>

<div>
	<table>
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Actions</th>
		</thead>
		<tbody>
			@foreach ($tags as $tag)
				<tr wire:key={{  $tag->id }}>
					<td class="px-4">
						<a class="text-blue-500" href="/tags/{{ $tag->id }}">{{ $tag->id }}</a>
					</td>
					<td class="px-4">{{ $tag->name }}</td>
					<td class="flex gap-4 px-4 text-blue-500">
						<a href="#">Edit</a>
						<a href="#">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>