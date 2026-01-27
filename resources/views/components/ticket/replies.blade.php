
<div class="bg-white shadow rounded-lg">
    <div class="border-b px-6 py-4">
        <h3 class="text-lg font-semibold text-gray-800">
            Replies
        </h3>
    </div>

    <div class="px-6 py-4 space-y-4">
        @forelse ($replies as $reply)
            {{-- Hide internal replies from non-admins --}}
            @if ($reply->internal && !auth()->user()?->role === 'admin')
                @continue
            @endif

            <x-ticket.reply :reply="$reply" />

        @empty
            <p class="text-sm text-gray-500">
                No replies yet.
            </p>
        @endforelse
    </div>
</div>
