<label class="block text-sm text-gray-600 mb-1">User</label>
<select name="user" class="form-select rounded-md border-gray-300">

    @foreach ($users as $user)
        <option
            value="{{ $user->id }}"
        >
            {{ $user->email }}
        </option>
    @endforeach
</select>
