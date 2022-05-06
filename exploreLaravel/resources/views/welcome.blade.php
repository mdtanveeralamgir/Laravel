<x-master>
    @section('categories')
        <x-categories :users="$users"> //passing data to the component
        </x-categories>
    @endsection
</x-master>
