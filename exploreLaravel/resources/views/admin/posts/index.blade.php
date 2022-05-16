<x-admin-master>
    @section('content')
        {!! Helper::displayFlashMessage()  !!}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Modify</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Modify</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->user_id}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td><a href="{{route('post', $post->id)}}">{{$post->title}}</a></td>
                                    <td>{{Str::limit($post->body, '50', '..')}}</td>
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td>{{$post->updated_at->diffForHumans()}}</td>
                                    <td>
                                        {{-- calling "update" method from PostPolicy so only auth user can see Edit button--}}
{{--                                        @can('update', $post)--}}
                                                <a class="btn btn-info" href="{{route('post.edit', $post->id)}}">Edit</a>
{{--                                        @endcan--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
{{--        pagination from laravel--}}
        <div class="d-flex">
            <div class="mx-auto">
                {{ $posts->links() }}
            </div>
        </div>
    @endsection
    @section('scripts')
        <!-- Page level plugins -->
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
{{--            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>--}}
        @endsection
</x-admin-master>
