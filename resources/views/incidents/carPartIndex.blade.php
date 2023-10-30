<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buscar repuesto para incidentes') }}

        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Número de reporte policial</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Número de placa</th>
                        <th scope="col">Buscar repuesto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidents as $item)
                        <tr>
                            <th>{{ $item->date }}</th>
                            <td>{{ $item->police_report_number }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->car_plate_number }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('incidents.searchCarPartView', $item) }}" role="button"><i class="fas fa-search-location"></i></a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    @if (Session::has('completeDiagnose'))
        <script>
            toastr.success("Incidente diagnósticado.");
        </script>
    @endif
</x-app-layout>
