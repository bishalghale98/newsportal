<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Edit Advertise</h5>
                <a href="{{ route('advertise.index') }}" class="btn btn-primary">Go Back</a>
            </div>


            <div class="card-body">
                <form action="{{ route('advertise.update', $advertise->id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <!-- Advertise Title -->
                        <div class="col-md-6 mb-3">
                            <label for="company_name" class="font-weight-bold fs-2">advertise Title <span
                                    class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" value="{{ $advertise->company_name }}"
                                id="company_name" name="company_name" placeholder="Enter advertise company_name">
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Advertise Phone -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="font-weight-bold fs-2">Phone</label>
                            <input type="number" class="form-control" value="{{ $advertise->phone }}" id="phone"
                                name="phone" placeholder="Enter advertise phone">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Advertise Link -->
                        <div class="col-md-6 mb-3">
                            <label for="link" class="font-weight-bold fs-2">Redirect Link</label>
                            <input type="text" class="form-control" value="{{ $advertise->link }}" id="link"
                                name="link" placeholder="Enter advertise link">
                            @error('link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Advertise Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="font-weight-bold fs-2">Advertise Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{$advertise->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$advertise->status == 0 ? 'selected' : ''}}>InActive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Advertise image -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="font-weight-bold fs-2">Advertise image</label>
                            <input type="file" class="form-control" id="image" name="image"
                                placeholder="Enter advertise image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <img src="{{ asset($advertise->image) }}" width="120 alt="">
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
