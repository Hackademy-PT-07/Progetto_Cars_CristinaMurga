<x-main>
    <x-slot:title>Aggiunge marca</x-slot:title>

    <div class="container mt-4">
        <div class="row">
            <div class="col-6 mx-auto">
            <div>
                    <a href="{{route('brands.index',)}}" class="text-secondary"><i class="bi bi-arrow-left"></i>Torna all'elenco delle marche</a>
                </div>
                <h2 class="my-4">Crea nuova marca</h2>
                <form action="{{route('brands.store')}}" method="POST">
                    @csrf
                    <div class="mt-2">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name') <span class="text-danger small"> {{$message}}</span> @enderror
                    </div>
                    <div>
                        <button type="submit" class="mt-3 btn btn-success">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-main>