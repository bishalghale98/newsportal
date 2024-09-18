<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Company</h5>
                @if (!$company)
                    <a href="{{ route('company.create') }}" class="btn btn-primary">Add+</a>
                @endif
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    SN
                                </th>
                                <th>Company logo</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($company)
                                <tr>
                                    <td class="text-center">
                                        1
                                    </td>
                                    <td>
                                        <img src="{{ asset($company->logo) }}" width="120" alt="">
                                    </td>
                                    <td>
                                        {{ $company->name }}
                                    </td>
                                    <td>
                                        {{ $company->email }}
                                    </td>
                                    <td>
                                        {{ $company->phone }}
                                    </td>
                                    <td>
                                        <form action="{{ route('company.destroy', $company->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-success">Edit</a>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</x-app-layout>
