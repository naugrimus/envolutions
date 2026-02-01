<form method="POST" action="{{ route('ticket.update', $ticket) }}" class="px-6 py-4 space-y-4">
    @csrf
    @method('PUT')

    <x-ticket.status  :ticket="$ticket" :readonly="$readonly"/>

    <x-ticket.priority :ticket="$ticket" :readonly="$readonly" />
    @can('update', $ticket)
        @can('assign user')
            <x-ticket.user />
        @endcan
        <div class="flex justify-end">


        <button
            type="submit"
            class="inline-flex items-center px-4 py-2
                                   bg-indigo-600 text-white text-sm font-medium
                                   rounded-md hover:bg-indigo-700
                                   focus:outline-none focus:ring-2
                                   focus:ring-indigo-500 focus:ring-offset-2"
        >
            Update Ticket
        </button>
        </div>
    @endcan
</form>
