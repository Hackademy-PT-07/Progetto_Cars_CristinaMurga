<x-main>
<x-slot:title>Modifica auto</x-slot:title>
  
    <div class="container mt-4">
        <div class="row">
            <div class="col-8 mx-auto">
                <div>
                    <a href="{{route('cars.show', $car)}}" class="text-secondary"><i class="bi bi-arrow-left"></i>Torna alla scheda</a>
                </div>
               
    
                <h2 class="my-4">Modifica auto</h2>

               <form action="{{route('cars.update', $car)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="brand">Marca</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id}}"
                        @selected(old('brand_id', $car->brand_id) === $brand->id)> {{$brand->name}} </option>
                        @endforeach
                    </select>
                </div>
               <div class="mb-2">
                    <label for="model">Modello</label>
                    <input type="text" class="form-control" name="model" value="{{ old('model', $car->model) }}">
                    @error('model')<span class="small text-danger">{{ $message }}</span> @enderror
               </div>
               <div class="mb-2">
                    <label for="engine">Motore</label>
                    <select name="engine" id="engine" class="form-control">
                          @foreach($engines as $engine)
                            <option value="{{ $engine }}" @selected(old('engine', $car->engine) === $engine)> {{$engine}} </option>
                        @endforeach
                    </select>
               </div>
               <div class="mb-2">
                <label for="price">Prezzo</label>
                <input type="text" id="price" name="price"  value="{{old('price', $car->price) }}" class="form-control">
                @error('price')<span class="small text-danger">{{ $message }}</span> @enderror
               </div>
               <div class="mb-3 p-1 ">
                <label for="extras">Accessori</label>
                <div class="form-control">
                @foreach($extras as $extra)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="{{ $extra->id }}" name="extras[]"
                        @checked($car->extras->contains($extra->id))>
                        <label for="flexCheckDefault" class="form-check-label">{{$extra->name}}</label>
                    </div>
                @endforeach
                @error('extra_id')<span class="small text-danger">{{ $message }}</span> @enderror
                </div>
              
               </div>
                <div>
                    <button type="submit" class="btn btn-success">Salva</button>
                </div>

               </form>
            </div>
        </div>
    </div>
</x-main>
