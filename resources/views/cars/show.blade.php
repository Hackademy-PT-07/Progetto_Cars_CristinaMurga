<x-main>
<x-slot:title>Scheda auto</x-slot:title>
    <div class="container mt-4">
        <div class="row">
            <div class="col-8 mx-auto">
                <div>
                    <a href="{{route('cars.index',)}}" class="text-secondary"><i class="bi bi-arrow-left"></i>Torna all'elenco</a>
                </div>
                <div class=" mt-4 d-flex justify-content-between" >
                    <h2 class="mb-4">{{$car->brand->name }} {{$car->model}}</h2>
                    <div class="d-flex">
                        <span class="me-1">
                            <a class="btn btn-secondary" href="{{ route('cars.edit', $car)}}"><i class="bi bi-pencil-fill"></i></a></span>
                        <span>
                            <form class="me-1" action="{{ route('cars.destroy', $car)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> <i class="bi bi-trash-fill"></i></button>
                            </form>
                        </span>
                    </div>
                </div>
               
                 <x-success/>
                <div class="card mb-1">
                    <div class="card-body">
                        <ul class="list-unstyled lead">
                            <li><strong>Marca: </strong>{{ $car->brand->name }}</li>
                            <li><strong>Motore: </strong>{{ $car->engine }}</li>
                            <li><strong>Prezzo: </strong>{{ \App\Custom\Currency::formatEuro($car->price)}}</li>
                        </ul>

                 
                    
                    <h5 class="lead"><strong>Accessori extra:</strong></h5>
                    @if($car->extras->count())
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <table class="table table-sm table-bordered mt-4 lead">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th class="text-end">Prezzo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($car->extras as $extra)
                                        <tr>
                                            <td>{{ $extra->name }}</td>
                                            <td>{{ \App\Custom\Currency::formatEuro($extra->price)}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="lead">
                                    <strong>Costo totale accessori:</strong> {{\App\Custom\Currency::formatEuro($extrasTotal)}}
                                </div>
                            </div>
                            @else
                           <p class="lead"> Non contiene accessori</p>
                            @endif
                            <div class="lead">
                                    <strong>Costo totale auto:</strong> {{ \App\Custom\Currency::formatEuro($extrasTotal + $car->price)}}
                                </div>
                        </div>
                    </div>
                    

                        

                       
                    </div>
                </div>
             
            </div>
        </div>
   

    </div>

</x-main>
