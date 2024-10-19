<?php

use App\Models\Domain;
use Livewire\Volt\Component;

new class extends Component {

	public $domains;

	public function mount()
	{
		$this->domains = Domain::all();
	}


}; ?>

<div>
	<table>
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Actions</th>
		</thead>
		<tbody>
			@foreach ($domains as $domain)
				<tr wire:key={{  $domain->id }}>
					<td class="px-4">{{ $domain->id }}</td>
					<td class="px-4">{{ $domain->name }}</td>
					<td class="px-4">{{ $domain->description }}</td>
					<td class="flex gap-4 px-4 text-blue-500">
						<a href="#">Edit</a>
						<a href="#">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>