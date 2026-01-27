@extends('base')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">
                Support Tickets
            </h1>


        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Created</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($tickets as $ticket)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-500">
                            #{{ $ticket->id }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $ticket->title }}
                            </div>
                            <div class="text-sm text-gray-500 truncate max-w-xs">
                                {{ $ticket->description }}
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                @if($ticket->status === 'open')
                                    bg-green-100 text-green-800
                                @elseif($ticket->status === 'in_progress')
                                    bg-yellow-100 text-yellow-800
                                @else
                                    bg-gray-200 text-gray-800
                                @endif
                            ">
                                {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $ticket->created_at->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
                            <a href="{{ route('ticket.show', $ticket) }}"
                               class="text-indigo-600 hover:text-indigo-900">
                                View
                            </a>
                            <a href="{{ route('ticket.edit', $ticket) }}"
                               class="text-gray-600 hover:text-gray-900">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-sm text-gray-500">
                            No tickets found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
