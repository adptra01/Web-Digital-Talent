<x-layout>
    <x-slot name="title">Post</x-slot>
    @include('layouts.table')
    <div class="card">
        <div class="card-body">
            <div class="container-fluid mb-5">
                <div class="row">
                    <div class="col-md">
                        <a class="btn btn-primary" href="{{ route('post.create') }}" role="button">add post</a>
                    </div>
                    <div class="col-md text-end">
                        <h4 class="card-title fw-bold">Post</h4>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>thumbail</th>
                            <th>title</th>
                            <th>category post</th>
                            <th>tags post</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td><img src="{{ Storage::url($item->thumbnail) }}" class="img-fluid rounded"
                                        width="70px" height="70px" style="object-fit: cover;" alt="thumbnail">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    @foreach ($item->tags as $key)
                                        {{ $key->name }},
                                    @endforeach
                                </td>
                                <td>
                                    <div class="d-flex gap-3 justify-content-center">
                                        <a class="btn btn-info btn-sm" href="{{ route('post.show', $item->id) }}"
                                            role="button">Show</a>
                                        <form action="{{ route('post.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
