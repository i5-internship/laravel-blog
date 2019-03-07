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

        <select class="form-control" name="user_id">
            <option selected disabled>Choose User....</option>
            @foreach($users as $user)
                @if(isset($post))
                    @if($user->id == $post->user->id)
                        <option value="{{ $post->user->id }}" selected>{{ $post->user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @else
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="User">Categories Choose</label>
        <select class="form-control" name="categories_id[]" multiple>
            @foreach($categories as $category)
                @if(isset($post))
                    @php $foundCategories = false @endphp
                    @foreach($post->categories as $categoryID)
                        @if($category->id == $categoryID->id)
                            @php $foundCategories = true @endphp
                        @endif
                    @endforeach

                    @if($foundCategories)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">@if(isset($post)) Update Post @else Submit @endif</button>
</form>