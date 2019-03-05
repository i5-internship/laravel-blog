<div>
    <form method="POST" action="{{ route('store') }}">
        {{ csrf_field() }}
        @if(isset($post))
            <input type="hidden" name="id" value="{{ $post->id }}">
        @endif
        <div class="form-group">
            <label for=""><strong>Title</strong></label>
            <input type="text" class="form-control" name="title" placeholder="Input title"
                   @if(isset($post))value="{{ $post->title }}" @else value="{{ old('value') }}"@endif>
        </div>
        <div class="form-group">
            <label for=""><strong>Description</strong></label>
            <textarea class="form-control" rows="4" name="description"
                      placeholder="Input description">@if(isset($post)){{ $post->description }}@else{{ old('value') }}@endif</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>