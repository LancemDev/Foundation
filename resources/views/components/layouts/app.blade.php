<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dracula">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- HEADER --}}
    <x-header separator progress-indicator>
        <x-slot:brand>
            <x-icon name="o-envelope" class="p-5 pt-3" />
        </x-slot:brand>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Upload Video" onclick="modal18.showModal()" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" />
        </x-slot:actions>
    </x-header>
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-app-brand />
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
            <x-app-brand class="p-5 pt-3" />

            {{-- MENU --}}
            <x-menu activate-by-route>

                {{-- User --}}
                @if($user = auth()->user())
                    <x-list-item :item="$user" sub-value="username" no-separator no-hover class="!-mx-2 mt-2 mb-5 border-y border-y-sky-900">
                        <x-slot:actions>
                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" />
                        </x-slot:actions>
                    </x-list-item>
                @endif

                <x-menu-item title="Home" link="/home" icon="o-home" />
                <x-menu-item title="Trending" link="/trending" icon="o-fire" />
                <x-menu-item title="Recommendations" link="/recommendations" icon="o-star" />
                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Logout" icon="o-wifi" />
                    <x-menu-item title="Archives" icon="o-archive-box" />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />


    {{-- MODALS --}}
    <x-modal id="modal17" title="Upload Video" class="p-5">
        <x-slot:actions>
            <x-button label="Cancel" onclick="modal17.closeModal()" class="btn-ghost" />
            <x-button label="Upload" onclick="modal17.closeModal()" class="btn-primary" />
        </x-slot:actions>
        <x-input placeholder="Title" />
        <x-input placeholder="Description" />
        <x-input placeholder="Tags" />
        <x-input placeholder="Video" />
    </x-modal>

    <x-modal id="modal18" class="p-5 items-center">
        <label for="file-upload" class="cursor-pointer">
            <x-fwb-o-upload class="w-12"/>
            <span class="mt-2 text-white">Upload Video or Drag and Drop here</span>
        </label>
        <input wire:model="file" id="file-upload" type="file" class="hidden" />
    </x-modal>
</body>
</html>
