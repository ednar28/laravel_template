<div>
    <label for="{{$id}}" class="form-label">
        {{ $label }}
    </label>

    <select name="{{$name}}" id="{{$id}}" class="form-input @error($name) error @enderror" value={{$value}}>
        <option value="" disabled>{{$placeholder}}</option>
        @foreach ($options as $option)
        <option value="{{$option['value']}}">{{$option['label']}}</option>
        @endforeach
    </select>

    @error($name)
    <div class="form-error">
        {{$message}}
    </div>
    @enderror
</div>