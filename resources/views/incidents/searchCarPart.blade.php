<x-app-layout>
    <div class="container mt-3">
        <form action="{{ route('incidents.completeDiagnose', $incident->id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Buscando Repuesto</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input value='{{ $incident->date }}' name="date" class="form-control" readonly />
                            </div>

                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea readonly class="form-control" name="description" cols="4" id="description">{{ $incident->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="police_report_number">Número de reporte policial</label>
                                <input readonly type="number" value='{{ $incident->police_report_number }}'
                                    name="police_report_number" min="0" step="1" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Ubicación</label>
                                <input readonly type="text" value='{{ $incident->address }}' class="form-control"
                                    name="address" id="address" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="car_plate_number">Número de placa</label>
                                <input readonly type="text" value='{{ $incident->car_plate_number }}'
                                    class="form-control" name="car_plate_number" id="car_plate_number" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="diagnosis">Diagnóstico</label>
                                <textarea readonly class="form-control" name="diagnosis" cols="4" id="diagnosis">{{ $incident->diagnosis }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Completar Búsqueda</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
