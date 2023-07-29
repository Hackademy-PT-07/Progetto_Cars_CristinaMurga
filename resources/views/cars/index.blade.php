<x-main>
<x-slot:title>Auto</x-slot:title>
    <div class="container mt-4">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-4">Elenco auto</h2>
                    <span> <a href="{{route('cars.create')}}" class="btn btn-sm btn-success"><i class="bi bi-plus-circle"></i> Aggiunge nuova auto</a></span>
                </div>
                <x-success/>
                 
                <div class="row">
                @foreach($cars as $car)
                    
                    <div class="col-12 col-md-6">
                        <div class="card mb-1">
                            <div class="card-body d-flex justify-content-between align-items-center ">
                                <h5>{{$car->brand->name }}  {{ $car->model}}</h5>
                                <a href="{{route('cars.show', $car)}}" class="text-end btn btn-sm btn-light"><i class="bi bi-eye-fill"></i> Visualizza</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
   

    </div>

</x-main>
