<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Edit Company</h5>
                <a href="{{ route('category.index') }}" class="btn btn-primary">Go Back</a>
            </div>


            <div class="card-body">
                <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <!-- category Title -->
                        <div class="col-md-6 mb-3">
                            <label for="title" class="font-weight-bold fs-2">category Title <span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" value="{{ $category->title }}" id="title"
                                name="title" placeholder="Enter category title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- category Nep Title -->
                        <div class="col-md-6 mb-3">
                            <label for="nep_title" class="font-weight-bold fs-2">category Nepali Title <span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" value="{{ $category->nep_title }}" id="nep_title"
                                name="nep_title" placeholder="Enter category nep_title">
                            @error('nep_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <!-- Submit Button -->

                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>

            </div>

        </div>
    </section>
</x-app-layout>
