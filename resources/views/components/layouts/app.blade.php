<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

	<!-- Scripts -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
	<div class="p-6">
		<nav class="flex gap-4 mb-6 text-blue-500">
			<a wire:navigate href="/domains/create">Create Domain</a>
			<a wire:navigate href="/domains">List Domains</a>
			<a wire:navigate href="/domains/manager">Domain Manager</a>
			<a wire:navigate href="/tags/create">Create Tag</a>
			<a wire:navigate href="/tags">List Tags</a>
		</nav>
		{{ $slot }}
	</div>
	<x-toaster-hub />
</body>

</html>