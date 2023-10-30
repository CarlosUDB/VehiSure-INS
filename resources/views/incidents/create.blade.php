<x-app-layout>
    <div class="container">
        <form action="{{ route('incidents.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h2>Crear incidente</h2>
                </div>
                <div class="card-body">         
                    <div class="form-row justify-content-center align-items-center">
                        <div class="">

                            <div class="form-outline mb-4">
                                <label for="date">Fecha</label>
                                <span class="form-control-feedback"></span>
                                <input name="date" class="form-control" id="datepicker"/>                                            
                                @error('date')
                                    <span class=”invalid-feedback” role=”alert”>
                                        <i class="fa fa-exclamation" aria-hidden="true" class="text-danger"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <label for="description">Descripción</label>
                                <span class=" form-control-feedback"></span>
                                <textarea class="form-control" name="description" cols="4" id="description"></textarea>                                                     
                                @error('description')
                                    <span class=”invalid-feedback” role=”alert”>
                                        <i class="fa fa-exclamation" aria-hidden="true" class="text-danger"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <label for="police_report_number">Número de reporte policial</label>
                                <span class="form-control-feedback"></span>
                                <input type="number" name="police_report_number" min="0" step="1" value="0" class="form-control">
                                 
                                @error('police_report_number')
                                    <span class=”invalid-feedback” role=”alert”>
                                        <i class="fa fa-exclamation" aria-hidden="true" class="text-danger"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  

                            <div class="form-outline mb-4">
                                <label for="address">Ubicación</label>
                                <span class="form-control-feedback"></span>
                                <input type="text" class="form-control" name="address" id="address" placeholder="" value="{{ old('address') }}">                                                       
                                @error('address')
                                    <span class=”invalid-feedback” role=”alert”>
                                        <i class="fa fa-exclamation" aria-hidden="true" class="text-danger"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <label for="car_plate_number">Número de placa</label>
                                <span class="form-control-feedback"></span>
                                <input type="text" class="form-control" name="car_plate_number" id="car_plate_number" placeholder="" value="{{ old('car_plate_number') }}">                                                       
                                @error('car_plate_number')
                                    <span class=”invalid-feedback” role=”alert”>
                                        <i class="fa fa-exclamation" aria-hidden="true" class="text-danger"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        
                            <div class="form-outline mb-4">
                                <div class="form-group">
                                    <label for="category">Taller</label>
                                    <select class="form-control" id="workshop_id" name="workshop_id">
                                        @foreach ($workshops as $workshop)
                                            <option value="{{ $workshop->id }}">{{ $workshop->name }}</option>
                                        @endforeach
                                   </select>
                                </div>
                                 
                                @error('workshop_id')
                                    <span class=”invalid-feedback” role=”alert”>
                                        <i class="fa fa-exclamation" aria-hidden="true" class="text-danger"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  

                            
                        </div>
                    </div>    
                    <div class="form-row justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>                 
                </div>
            </div>
        </form>
    </div>
</x-app-layout>