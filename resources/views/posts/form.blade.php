<form method="POST" action="{{ route('store') }}">
    {{ csrf_field() }}
    @if(isset($post))
        <input type="hidden" name="id" value="{{ $post->id }}">
    @endif
    <div class="form-group">
        <label for="title">Tittle</label>
        <input name="title" type="text" class="form-control" placeholder="Title"
               @if(isset($post))value="{{ $post->title }}" @else value="{{ old('title') }}"@endif>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="4" type="text" class="form-control"
                  placeholder="Description">@if(isset($post)){{ $post->description }}@else {{ old('description') }}@endif</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>