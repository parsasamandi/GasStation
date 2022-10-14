<div class="{{ $class ?? null }}">
        {{-- Label --}}
        <span class="form-label">{{ $name }}:</span>
        {{-- Input --}}
        <input type="{{ $type ?? 'text' }}" name="{{ $key }}" id="{{ $key }}" 
                value="{{ $value ?? null }}" class="form-control" placeholder="{{ $name }}">
</div>