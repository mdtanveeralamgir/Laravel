<x-admin-master>
    @section('content')
        <hi>Create post here</hi>
        <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
{{--            <input type="hidden" name="_method" value="PUT">--}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" aria-describedby="" placeholder="Title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <img src="{{$post->post_image}}" alt="Post Image">
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="post_image" class="form-control">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <form method="post" action="{{route('post.destroy', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @endsection
</x-admin-master>
