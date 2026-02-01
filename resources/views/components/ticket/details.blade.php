@props(['ticket', 'readonly', 'statusses'])

<div class="bg-white shadow rounded-lg">
    <div class="border-b px-6 py-4">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ $ticket->title }}
        </h2>
    </div>

    <div class="px-6 py-4 space-y-4">
        <div class="flex flex-wrap gap-4">
            <x-ticket.ticketform :ticket="$ticket" :readonly="$readonly" />

        </div>

        <div>
            <h4 class="text-sm font-semibold text-gray-600 mb-1">
                Description
            </h4>
            <p class="text-gray-700 leading-relaxed">
                {{ $ticket->description }}
            </p>
        </div>
    </div>
</div>
