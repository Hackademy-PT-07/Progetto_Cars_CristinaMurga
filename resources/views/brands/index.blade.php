<x-main>
    <x-slot:title>Marche</x-slot:title>

    <div class="container mt-4">
        <div class="row">
            <div class="col-8 mx-auto">
            <div class="d-flex justify-content-between">
                    <h2 class="mb-4">Tutte le marche</h2>
                    <span> 
                        <a href="{{route('brands.create')}}" class="btn btn-sm btn-success">
                        <i class="bi bi-plus-circle"></i> Aggiunge nuova marca</a>
                    </span>
                </div>
                <x-success/>
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                 
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{ $brand->id}}</td>
                            <td>{{ $brand->name }}</td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route('brands.edit', $brand)}}" class="me-1 btn btn-sm btn-secondary"><i class="bi bi-pencil-fill"></i></a>
                                <form action="{{ route('brands.destroy', $brand)}}" method="POST" class="me-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-main>