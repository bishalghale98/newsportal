<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Advertise</h5>

                <a href="{{ route('advertise.create') }}" class="btn btn-primary">Add New advertise +</a>

            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    SN
                                </th>
                                <th>Image</th>
                                <th>Company Name</th>
                                <th>Company Phone</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advertises as $index => $advertise)
                                <tr>
                                    <td class="text-center">
                                        {{ ++$index }}
                                    </td>

                                    <td>
                                        <img src="{{ asset($advertise->image) }}" width="80" alt="">

                                    </td>

                                    <td>
                                        {{ $advertise->company_name }}

                                    </td>

                                    <td>
                                        {{ $advertise->phone }}
                                    </td>

                                    <td>
                                        {{ $advertise->link }}
                                    </td>

                                    <td>
                                        @if ($advertise->status == 1)
                                            <span class="badge bg-success text-white">Active</span>
                                        @else
                                            <span class="badge bg-danger text-white">In Active</span>
                                        @endif
                                    </td>

                                    <td>
                                        <form action="{{ route('advertise.destroy', $advertise->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('advertise.edit', $advertise->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ route('advertise.destroy', $advertise->id) }}"
                                                class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
