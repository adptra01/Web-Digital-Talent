<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#{{ Str::slug($item->name) }}">
    update
</button>

<!-- Modal -->
<div class="modal fade" id="{{ Str::slug($item->name) }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tag.update', $item->id) }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label float-start">Update name category</label>
                        <input type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" value="{{ $item->name }}" placeholder="Enter update category">
                        @error('name')
                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
