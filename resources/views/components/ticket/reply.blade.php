<div class="bg-white shadow-md rounded-lg p-6 mb-4 border border-gray-200">

    <p class="text-gray-700 mb-3">{{ $reply->reply }}</p>

    <div class="flex items-center space-x-2">
        @if($reply->internal)
            <span class="px-2 py-1 text-xs font-medium text-white bg-red-500 rounded-full">Internal</span>
        @else
            <span class="px-2 py-1 text-xs font-medium text-white bg-green-500 rounded-full">Public</span>
        @endif

        <span class="text-sm text-gray-500">Ticket ID: {{ $reply->ticket_id }}</span>
    </div>
</div>
