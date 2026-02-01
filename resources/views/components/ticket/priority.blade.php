
@if($readonly)
    <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-800">
    Priority: {{ ucfirst($ticket->priority) }}
    </span>
@else
    <label class="block text-sm text-gray-600 mb-1">Priority</label>
    <select name="priority" class="form-select rounded-md border-gray-300">

        @foreach ($priorities as $priority)
            <option
                value="{{ $priority }}"
                @selected($ticket->priority === $priority)
            >
                {{ ucfirst(str_replace('_', ' ', $priority)) }}
            </option>
        @endforeach
    </select>

@endif
