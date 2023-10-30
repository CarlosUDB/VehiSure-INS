<x-app-layout>
    <x-slot name="header">

        @if (is_null(Auth::user()->insurer_id))
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Incidentes que necesitan un diagnóstico') }}

            </h2>
        @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Incidentes  ') }}

                <a href="{{ route('incidents.create') }}" class="btn btn-outline-success">
                    {{ __('+') }}
                </a>
            </h2>
        @endif


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


                        @if (is_null(Auth::user()->insurer_id))
                            <th scope="col">Diagnosticar</th>
                        @else
                            <th scope="col">Taller</th>
                            <th scope="col">Estado</th>
                        @endif

                    </tr>
                </thead>
                <tbody>


                    @if (is_null(Auth::user()->insurer_id))
                        @foreach ($incidents as $item)
                            <tr>
                                <th>{{ $item->date }}</th>
                                <td>{{ $item->police_report_number }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->car_plate_number }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('incidents.diagnose', $item) }}"
                                        role="button"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @foreach ($incidents as $item)
                            <tr>
                                <th>{{ $item->date }}</th>
                                <td>{{ $item->police_report_number }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->car_plate_number }}</td>
                                <td>
                                    @foreach ($workshops as $w)
                                        {{ $item->workshop_id == $w->id ? $w->name : '' }}
                                    @endforeach
                                </td>
                                <td>
                                    @if ($item->status == 'diagnosing')
                                        Diagnósticando
                                    @elseif($item->status == 'getting_part')
                                        Obteniendo repuesto
                                    @elseif($item->status == 'purchased_part')
                                        Repuesto comprado
                                    @elseif($item->status == 'fixing')
                                        Reparando
                                    @elseif($item->status == 'fixed')
                                        Reparado
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif





                </tbody>
            </table>
        </div>
    </div>

    @if (Session::has('created'))
        <script>
            toastr.success("Incidente agregado.");
        </script>
    @endif

    @if (Session::has('completeDiagnose'))
        <script>
            toastr.success("Incidente diagnósticado.");
        </script>
    @endif
</x-app-layout>
