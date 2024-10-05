<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Create User</h5>
                <a href="{{ route('user.index') }}" class="btn btn-primary">Go Back</a>
            </div>


            <div class="card-body">
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- User with csv file -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="font-weight-bold fs-2">Upload CSV File</label>
                            <input type="file" class="form-control" id="image" name="image">
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
