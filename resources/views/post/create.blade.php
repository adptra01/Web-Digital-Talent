<x-layout>
    <x-slot name="title">Create Post</x-slot>
    <div class="card">
        <div class="card-header">
            <h4 class="text-center fw-bold">add post</h4>
            <hr>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">title</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                    placeholder="name">
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="mb-3">
                        <label for="" class="form-label">City</label>
                        <select class="form-select" name="" id="">
                            <option selected>Select one</option>
                            <option value="">New Delhi</option>
                            <option value="">Istanbul</option>
                            <option value="">Jakarta</option>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="mb-3">
                        <label for="" class="form-label">City</label>
                        <select class="form-select" name="" id="">
                            <option selected>Select one</option>
                            <option value="">New Delhi</option>
                            <option value="">Istanbul</option>
                            <option value="">Jakarta</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
