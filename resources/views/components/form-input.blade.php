<div>
    <label for="{{$id}}" class="form-label">
        {{ $label }}
    </label>

    <input type="{{$type}}" class="form-input @error($name) error @enderror" name="{{$name}}" value="{{$value}}"
        placeholder="{{$placeholder}}">

    @error($name)
    <div class="form-error">
        {{$message}}
    </div>
    @enderror
</div>