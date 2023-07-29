<x-layout>
    <x-slot name="title">Category & Tag</x-slot>
    @include('layouts.table')
    <div class="container-fluid mb-3 justify-content-center">
        <ul class="nav nav-pills card-header-pills justify-content-center" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#navs-pills-within-card-active" role="tab">Category</button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" data-bs-toggle="tab"
                    data-bs-target="#navs-pills-within-card-link" role="tab">Tag</button>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="navs-pills-within-card-active" role="tabpanel">
                    <div class="container-fluid mb-5">
                        <div class="row">
                            <div class="col-md">
                                @include('category.store ')
                            </div>
                            <div class="col-md text-end">
                                <h4 class="card-title fw-bold">Category</h4>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="display table nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $no => $item)
                                    <tr>
                                        <td>{{ ++$no }}.</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div class="d-flex gap-3 justify-content-center">
                                                @include('category.update')
                                                <form action="{{ route('category.destroy', $item->id) }}"
                                                    method="post">
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
                <div class="tab-pane fade" id="navs-pills-within-card-link" role="tabpanel">
                    <div class="container-fluid mb-5">
                        <div class="row">
                            <div class="col-md">
                                @include('tag.store')
                            </div>
                            <div class="col-md text-end">
                                <h4 class="card-title fw-bold">Tag</h4>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="display table nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $no => $item)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div class="d-flex gap-3 justify-content-center">
                                                @include('tag.update')
                                                <form action="{{ route('tag.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
        </div>
    </div>

</x-layout>
