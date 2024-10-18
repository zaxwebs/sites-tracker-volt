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
		</thead>
		<tbody>
			@foreach ($domains as $domain)
				<tr>
					<td class="px-4">{{ $domain->id }}</td>
					<td class="px-4">{{ $domain->name }}</td>
					<td class="px-4">{{ $domain->description }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>