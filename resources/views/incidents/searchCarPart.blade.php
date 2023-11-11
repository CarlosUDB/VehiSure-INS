<x-app-layout>
    <div class="container mt-3">
        <form action="{{ route('incidents.completeDiagnose', $incident->id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Buscando Repuesto</h2>
                </div>
                <div class="card-body">
                    <input type="hidden" name="incident_id" value="{{ $incident->id }}">
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
                            <div class="form-group">
                                <label for="car_part_id">Repuesto</label>
                                <div class="dropdown">
                                    <input class="form-control" id="search" type="text" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" autocomplete="off">
                                    <div class="dropdown-menu" aria-labelledby="search" id="searchDropdown"></div>
                                    <input type="hidden" name="car_part_id" id="cart_part_id">
                                </div>
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
                            <div class="form-group">
                                <label for="quantity">Cantidad</label>
                                <input type="number" name="quantity" min="0" step="1"
                                    class="form-control">
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
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        var searchInput = document.getElementById('search');
        var hiddenInput = document.getElementById('cart_part_id');
        var searchDropdown = document.getElementById('searchDropdown');

        searchInput.addEventListener('input', function(event) {
            var query = event.target.value;
            fetch(path + '?query=' + query)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    searchDropdown.innerHTML = "";

                    if (Array.isArray(data)) {
                        data.forEach(function(item) {
                            if (item.name && item.id) {
                                var resultItem = document.createElement("button");
                                resultItem.classList.add("dropdown-item");
                                resultItem.type = "button";
                                resultItem.textContent = item.name;
                                resultItem.addEventListener("click", function() {
                                    searchInput.value = item
                                    .name;
                                    hiddenInput.value = item
                                    .id;
                                });
                                searchDropdown.appendChild(resultItem);
                            }
                        });
                    }
                })
                .catch(function(error) {
                    console.log('Error fetching data:', error);
                });
        });
    </script>
</x-app-layout>
