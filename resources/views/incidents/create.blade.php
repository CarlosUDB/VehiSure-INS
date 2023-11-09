<x-app-layout>
    <style>
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item {
            padding: 0;
            margin: 0;
            font-size: 0.9rem;
        }

        .breadcrumb-item.active {
            color: #007bff;
        }

        .breadcrumb-item.active::before {
            content: "";
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/incidents">Página anterior /</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Página actual</li>
                    </ol>
                </nav>
            </div>
        </div>
        <form action="{{ route('incidents.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Crear Incidente</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input name="date" class="form-control" id="datepicker" />
                                @error('date')
                                    <div class="invalid-feedback">
                                        <i class="fa fa-exclamation text-danger" aria-hidden="true"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" cols="4" id="description"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        <i class="fa fa-exclamation text-danger" aria-hidden="true"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Ubicación</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder=""
                                    value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback">
                                        <i class="fa fa-exclamation text-danger" aria-hidden="true"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="car_plate_number">Número de placa</label>
                                <input type="text" class="form-control" name="car_plate_number" id="car_plate_number"
                                    placeholder="" value="{{ old('car_plate_number') }}">
                                @error('car_plate_number')
                                    <div class="invalid-feedback">
                                        <i class="fa fa-exclamation text-danger" aria-hidden="true"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="police_report_number">Número de reporte policial</label>
                                <input type="number" name="police_report_number" min="0" step="1"
                                    value="0" class="form-control">
                                @error('police_report_number')
                                    <div class="invalid-feedback">
                                        <i class="fa fa-exclamation text-danger" aria-hidden="true"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Taller</label>
                                <select class="form-control" id="workshop_id" name="workshop_id">
                                    @foreach ($workshops as $workshop)
                                        <option value="{{ $workshop->id }}">{{ $workshop->name }}</option>
                                    @endforeach
                                </select>
                                @error('workshop_id')
                                    <div class="invalid-feedback">
                                        <i class="fa fa-exclamation text-danger" aria-hidden="true"></i>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
