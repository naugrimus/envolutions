
@if ($readonly)
    <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                    Status: {{ ucfirst($ticket->status) }}
                </span>
@else

    <label class="block text-sm text-gray-600 mb-1">Status</label>
    <select name="status" class="form-select rounded-md border-gray-300">

        @foreach ($statusses as $status)
            <option
                value="{{ $status }}"
                @selected($ticket->status === $status)
            >
                {{ ucfirst(str_replace('_', ' ', $status)) }}
            </option>
        @endforeach
    </select>
@endif
