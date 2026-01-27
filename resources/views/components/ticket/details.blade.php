@props(['ticket'])

<div class="bg-white shadow rounded-lg">
    <div class="border-b px-6 py-4">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ $ticket->title }}
        </h2>
    </div>

    <div class="px-6 py-4 space-y-4">
        <div class="flex flex-wrap gap-4">
            <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                Status: {{ ucfirst($ticket->status) }}
            </span>

            <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-800">
                Priority: {{ ucfirst($ticket->priority) }}
            </span>
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
