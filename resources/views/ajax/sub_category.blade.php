
<option value="" disabled selected>Nothing selected</option>
    @foreach ($subs as $sub)
        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
    @endforeach

