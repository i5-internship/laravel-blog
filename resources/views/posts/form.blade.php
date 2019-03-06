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
    <div class="form-group">
        <label for="User">User Choose</label>

        @if(isset($post))
            <select class="form-control" name="user_id">
                <option value="{{ $post->user->id }}">{{ $post->user->name }}</option>
            </select>
        @else
            <select class="form-control" name="user_id" id="">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        @endif

    </div>
    <div class="form-group">
        <label for="User">Categories Choose</label>
        @if(isset($post))
            @if(count($post->categories) > 0)
                <select class="form-control" name="categories_id[]" multiple>
                    @foreach($post->categories as $categoryID)
                        <option value="{{ $categoryID }}">{{ $categoryID->name }}</option>
                    @endforeach
                </select>
            @endif
        @else
            <select name="categories_id[]" class="form-control" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        @endif

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>