@props([
    'ticket',
    'action' => route('ticket.reply.store', $ticket),
])

<div class="bg-white shadow rounded-lg">
    <div class="border-b px-6 py-4">
        <h3 class="text-lg font-semibold text-gray-800">
            Add Reply
        </h3>
    </div>

    <form method="POST" action="{{ $action }}" class="px-6 py-4 space-y-4">
        @csrf

        <div>
            <label for="reply" class="block text-sm font-medium text-gray-700 mb-1">
                Reply
            </label>
            <textarea
                name="reply"
                id="reply"
                rows="4"
                required
                class="w-full rounded-md border-gray-300 shadow-sm
                       focus:border-indigo-500 focus:ring-indigo-500"
            >{{ old('reply') }}</textarea>

            @error('reply')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Internal reply (admins only) --}}
        @if (auth()->user()?->role === 'admin')
            <div class="flex items-center gap-2">
                <input
                    type="checkbox"
                    name="internal"
                    id="internal"
                    value="1"
                    class="rounded border-gray-300 text-indigo-600
                           focus:ring-indigo-500"
                >
                <label for="internal" class="text-sm text-gray-700">
                    Internal reply (visible to admins only)
                </label>
            </div>
        @endif

        <div class="flex justify-end">
            <button
                type="submit"
                class="inline-flex items-center px-4 py-2
                       bg-indigo-600 text-white text-sm font-medium
                       rounded-md hover:bg-indigo-700
                       focus:outline-none focus:ring-2
                       focus:ring-indigo-500 focus:ring-offset-2"
            >
                Submit Reply
            </button>
        </div>
    </form>
</div>
