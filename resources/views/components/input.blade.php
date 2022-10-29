<div class="{{ $class ?? null }}">
        {{-- Label --}}
        <label class="form-label">{{ $name }}:</label>
        {{-- Input --}}
        <input type="{{ $type ?? 'text' }}" name="{{ $key }}" id="{{ $key }}" 
                value="{{ $value ?? null }}" class="form-control" placeholder="{{ $name }}">
</div>