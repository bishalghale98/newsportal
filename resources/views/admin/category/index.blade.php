<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Category</h5>

                <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category +</a>

            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    SN
                                </th>
                                <th>Category Title</th>
                                <th>Category Nepali title</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as  $index => $category)
                                <tr>
                                    <td class="text-center">
                                        {{ ++$index }}
                                    </td>

                                    <td>
                                        {{ $category->title }}

                                    </td>

                                    <td>
                                        {{ $category->nep_title }}
                                    </td>

                                    <td>
                                        {{ $category->slug }}
                                    </td>

                                    <td>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ route('category.destroy', $category->id) }}"
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
