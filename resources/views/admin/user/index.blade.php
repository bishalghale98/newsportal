<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>User</h5>

                <a href="{{ route('user.create') }}" class="btn btn-primary">Add New Users +</a>
                <a href="{{ route('export') }}" class="btn btn-info">Export Users</a>

            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    SN
                                </th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td class="text-center font-weight-bold fs-4">
                                        {{ ++$index }}
                                    </td>

                                    <td class="font-weight-bold fs-4">
                                        {{ $user->id }}
                                    </td>

                                    <td class="font-weight-bold fs-4">
                                        {{ $user->name }}
                                    </td>

                                    <td class="font-weight-bold fs-4">
                                        {{ $user->email }}
                                    </td>

                                    <td class="font-weight-bold fs-4">
                                        {{ $user->role }}
                                    </td>

                                    <td class="font-weight-bold fs-4">
                                        {{ nepalidate($user->created_at) }}
                                    </td>



                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-danger"
                                                data-confirm-delete="true">Delete</a>
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
