<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Create Post</h5>
                <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back</a>
            </div>


            <div class="card-body">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- post Title -->

                        <div class="col-md-12 mb-3">
                            <label for="title" class="font-weight-bold fs-2">Title
                                <span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" value="{{ old('title') }}" id="title"
                                name="title">

                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- post category -->
                        <div class="col-md-6 mb-3">
                            <label for="categories" class="font-weight-bold fs-2">Categories
                                <span class="text-danger">
                                    *</span></label>
                            <select name="categories[]" class="form-control select2" id="categories" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>

                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- post description -->

                        <div class="col-md-12 mb-3">
                            <label for="description" class="font-weight-bold fs-2">Description <span
                                    class="text-danger">
                                    *</span></label>
                            <textarea name="description" id="description" class="form-control summernote">  {{ old('description') }}</textarea>

                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- post meta_keywords --}}
                        <div class="col-md-12 mb-3">
                            <label for="meta_keywords" class="font-weight-bold fs-2">Post Meta Keywords </label>
                            <textarea name="meta_keywords" class="form-control" id="meta_keywords" cols="30" rows="10">
                                {{ old('meta_keywords') }}
                            </textarea>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- post meta_description --}}
                        <div class="col-md-12 mb-3">
                            <label for="meta_description" class="font-weight-bold fs-2">Post Meta Description </label>
                            <textarea name="meta_description" class="form-control" id="meta_description" cols="30" rows="10">
                                {{ old('meta_description') }}
                            </textarea>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- image --}}
                        <div class="col-md-3 mb-3">
                            <label for="image" class="font-weight-bold fs-2">Image
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Accepted file types: jpeg, png, jpg</small>
                            @error('image')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Submit Button -->

                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </section>
</x-app-layout>
