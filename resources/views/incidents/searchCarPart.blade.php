<x-app-layout>
    <div class="container">{{--cambiar ruta por la de completar busqueda--}}
        <form action="{{ route('incidents.completeDiagnose', $incident->id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h2>Buscando repuesto</h2>
                </div>
                <div class="card-body">         
                    <div class="form-row justify-content-center align-items-center">
                        <div class="">

                            <div class="form-outline mb-4">
                                <label for="date">Fecha</label>
                                <span class="form-control-feedback"></span>
                                <input value='{{$incident->date}}' name="date" class="form-control" readonly/>                                            

                            </div>

                            <div class="form-outline mb-4">
                                <label for="description">Descripción</label>
                                <span class=" form-control-feedback"></span>
                                <textarea readonly class="form-control" name="description" cols="4" id="description">{{$incident->description}}</textarea>                                                     
                            </div>

                            <div class="form-outline mb-4">
                                <label for="police_report_number">Número de reporte policial</label>
                                <span class="form-control-feedback"></span>
                                <input readonly type="number" value='{{$incident->police_report_number}}' name="police_report_number" min="0" step="1" value="0" class="form-control">
                            </div>  

                            <div class="form-outline mb-4">
                                <label for="address">Ubicación</label>
                                <span class="form-control-feedback"></span>
                                <input readonly type="text" value='{{$incident->address}}' class="form-control" name="address" id="address" placeholder="" value="{{ old('address') }}">
                            </div>

                            <div class="form-outline mb-4">
                                <label for="car_plate_number">Número de placa</label>
                                <span class="form-control-feedback"></span>
                                <input readonly type="text" value='{{$incident->car_plate_number}}' class="form-control" name="car_plate_number" id="car_plate_number" placeholder="" value="{{ old('car_plate_number') }}">
                            </div>

                            <div class="form-outline mb-4">
                                <label for="diagnosis">Diagnóstico</label>
                                <span class=" form-control-feedback"></span>
                                <textarea readonly class="form-control" name="diagnosis" cols="4" id="diagnosis">{{$incident->diagnosis}}'</textarea>
                            </div>

                            {{--aca inputs para llenar lo de requisicion--}}
                            
                        </div>
                    </div>    
                    <div class="form-row justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary">Completar búsqueda</button>
                    </div>                 
                </div>
            </div>
        </form>
    </div>
</x-app-layout>