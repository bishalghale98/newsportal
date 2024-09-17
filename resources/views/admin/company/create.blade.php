<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Create Company</h5>
                <a href="{{ route('company.index') }}" class="btn btn-primary">Go Back</a>
            </div>


            <div class="card-body">
                <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Company Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="font-weight-bold fs-2">Company Name <span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" value="{{ old('name') }}" id="name"
                                name="name" placeholder="Enter company name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="col-md-6 mb-3">
                            <label for="address" class="font-weight-bold fs-2">Address<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" value="{{ old('address') }}" id="address"
                                name="address" placeholder="Enter company address">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="font-weight-bold fs-2">Phone Number<span class="text-danger">
                                    *</span></label>
                            <input type="tel" class="form-control" value="{{ old('phone') }}" id="phone"
                                name="phone" placeholder="Enter phone number">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="font-weight-bold fs-2">Email Address<span class="text-danger">
                                    *</span></label>
                            <input type="email" class="form-control" value="{{ old('email') }}" id="email"
                                name="email" placeholder="Enter email address">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- PAN Number -->
                        <div class="col-md-6 mb-3">
                            <label for="pan" class="font-weight-bold fs-2">PAN Number<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" value="{{ old('pan') }}" id="pan"
                                name="pan" placeholder="Enter PAN number">
                            @error('pan')
                                <span class="text-danger">{{ 'The Pan number field is required.' }}</span>
                            @enderror

                        </div>

                        <!-- Registration Number -->
                        <div class="col-md-6 mb-3">
                            <label for="reg_no" class="font-weight-bold fs-2">Registration Number<span
                                    class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="{{ old('reg_no') }}" id="reg_no"
                                name="reg_no" placeholder="Enter registration number">
                            @error('reg_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Facebook Link -->
                        <div class="col-md-6 mb-3">
                            <label for="facebook" class="font-weight-bold fs-2">Facebook URL</label>
                            <input type="text" class="form-control" value="{{ old('facebook') }}" id="facebook"
                                name="facebook" placeholder="Enter Facebook profile URL">
                        </div>

                        <!-- YouTube Link -->
                        <div class="col-md-6 mb-3">
                            <label for="youtube" class="font-weight-bold fs-2">YouTube Channel URL</label>
                            <input type="text" class="form-control" value="{{ old('youtube') }}" id="youtube"
                                name="youtube" placeholder="Enter YouTube channel URL">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Logo Upload -->
                        <div class="col-md-6 mb-3">
                            <label for="logo" class="font-weight-bold fs-2">Company Logo<span class="text-danger">
                                    *</span></label>
                            <input type="file" class="form-control" id="logo" name="logo"
                                accept="image/*">
                            <p class="form-text text-muted mb-0">File types: jpeg, png, jpg</p>

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
