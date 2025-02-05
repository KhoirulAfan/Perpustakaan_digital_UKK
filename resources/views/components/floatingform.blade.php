@props(['name'])

<div class="mb-2 form-floating">
    <input type="text" name="{{ $name }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan {{ $name }}" id="{{ $name }}"> 
    <label for="{{ $name }}" class="form-label">{{ $slot }}</label>
    @error("{{ $name }}") 
        <div class="invalid-feedback">
            <p>{{ $message }}</p>
        </div>
    @enderror
</div> 