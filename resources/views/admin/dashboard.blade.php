@props(['products'])

<x-layout>
    <div class="row m-0 mt-3">
        <div class="col-lg-2">
            <x-dashboard-link></x-dashboard-link>
        </div>
        <div class="col-lg-10" style="max-height: 650px;overflow-y:scroll;">
            <table class="table table-secondary table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->name }}</td>
                            <td>${{ $p->price }}</td>
                            <td>{{ $p->description }}</td>
                            <td>{{ $p->category->name }}</td>
                            <td>
                                <form action="/admin/dashboard/edit/{{$p->id}}" method="GET">
                                    <button class="btn btn-sm btn-warning">edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="/admin/dashboard/delete/{{$p->name}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger">remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>