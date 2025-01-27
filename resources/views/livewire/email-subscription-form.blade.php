<flux:card class="space-y-6">
    @if (! $subscribed)
        @if ($heading)
            <flux:heading size="xl">{{ $heading }}</flux:heading>
        @endif

        @if ($subheading)
            <flux:subheading>{{ $subheading }}</flux:subheading>
        @endif

        <flux:input.group>
            <flux:input wire:model="email" placeholder="email@example.com"/>
            <flux:button wire:click="subscribe" :icon="$icon">{{ $subscribe }}</flux:button>
        </flux:input.group>

        <flux:error name="email"/>
    @else
        <flux:subheading size="lg"><flux:icon.check class="inline"/> {{ $subscribed_message }}</flux:subheading>
    @endif
</flux:card>
