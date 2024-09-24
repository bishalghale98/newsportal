<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Create Category</h5>
                <a href="{{ route('category.index') }}" class="btn btn-primary">Go Back</a>
            </div>


            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Category Title -->
                        <div class="col-md-6 mb-3">
                            <label for="title" class="font-weight-bold fs-2">Category Title <span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" value="{{ old('title') }}" id="title"
                                name="title" placeholder="Enter category title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Category nep_title -->
                        <div class="col-md-6 mb-3">
                            <label for="nep_title" class="font-weight-bold fs-2">Category Nep Title</label>
                            <input type="text" class="form-control" value="{{ old('nep_title') }}" id="nep_title"
                                name="nep_title" placeholder="Enter category nep_title">
                            @error('nep_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                    <!-- Submit Button -->

                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>

            </div>

        </div>
    </section>
</x-app-layout>
