
<option value="" disabled selected>Nothing selected</option>
{{-- @if($edit)
    @foreach ($subs as $sub)
        <option value="{{ $sub->id }}"{{ $sub->id == $list->subCategory->id ? 'selected':'' }}>{{ $sub->name }}</option>
    @endforeach
@else --}}
    @foreach ($subs as $sub)
        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
    @endforeach
{{-- @endif --}}

