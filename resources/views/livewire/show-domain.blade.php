<?php

use App\Models\Domain;
use Livewire\Volt\Component;

new class extends Component {

	public Domain $domain;

	public function mount($id)
	{
		$this->domain = Domain::findOrFail($id);
	}

}; ?>

<div>
	<table>
		<tbody>
			<tr>
				<th class="pr-4 text-left">ID</th>
				<td>{{ $domain->id }}</td>
			</tr>
			<tr>
				<th class="pr-4 text-left">Name</th>
				<td>{{ $domain->name }}</td>
			</tr>
			<tr>
				<th class="pr-4 text-left">Description</th>
				<td>{{ $domain->description }}</td>
			</tr>
		</tbody>
	</table>
</div>