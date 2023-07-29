<x-main>
<x-slot:title>Aggiunge auto</x-slot:title>
    <div class="container mt-4">
  
        <div class="row">
            <div class="col-8 mx-auto">
                <div>
                    <a href="{{route('cars.index',)}}" class="text-secondary"><i class="bi bi-arrow-left"></i>Torna all'elenco</a>
                </div>
                <h2 class="my-4">Inserisce nuova auto</h2>
               <form action="{{route('cars.store')}}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="brand">Marca</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id}}"> {{$brand->name}} </option>
                        @endforeach
                    </select>
                </div>
               <div class="mb-2">
                    <label for="model">Modello</label>
                    <input type="text" class="form-control" name="model">
                    @error('model')<span class="small text-danger">{{ $message }}</span> @enderror
               </div>
               <div class="mb-2">
                    <label for="engine">Motore</label>
                    <select name="engine" id="engine" class="form-control">
                          @foreach($engines as $engine)
                            <option value="engine"> {{$engine}} </option>
                        @endforeach
                    </select>
               </div>
               <div class="mb-2">
                <label for="price">Prezzo</label>
                <input type="text" id="price" name="price" class="form-control">
                @error('price')<span class="small text-danger">{{ $message }}</span> @enderror
               </div>
               <div class="mb-3 p-1 ">
                <label for="extras">Accessori</label>
                <div class="form-control">
                @foreach($extras as $extra)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="{{ $extra->id }}" name="extras[]">
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
