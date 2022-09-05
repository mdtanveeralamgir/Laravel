<x-admin-master>
    @section('content')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User's table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>username</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>email</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>username</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>email</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->name}}</td>
                                <td><img width="60" height="60" src="{{$user->avatar}}" alt="Users avatar"></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="DELETE">
                                    </form>
                                </td>
{{--                                <td>--}}
{{--                                    --}}{{-- calling "update" method from PostPolicy so only auth user can see Edit button--}}
{{--                                    --}}{{--                                        @can('update', $post)--}}
{{--                                    <a class="btn btn-info" href="{{route('post.edit', $post->id)}}">Edit</a>--}}
{{--                                    --}}{{--                                        @endcan--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
        @section('scripts')
        <!-- Page level plugins -->
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
        @endsection
</x-admin-master>
