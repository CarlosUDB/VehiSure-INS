<x-app-layout>
    <x-slot name="header">

        @if ((Auth::user()->insurer_id))
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Incidentes que necesitan autorizarse') }}
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


                        @if ((Auth::user()->insurer_id))
                            <th scope="col">Taller</th>
                            <th scope="col">Estado</th>
                        @endif
                        <th>Autorizar reparación</th>

                    </tr>
                </thead>
                <tbody>
                    @if ((Auth::user()->insurer_id))
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
                                <td>
                                    <form id="updateForm_{{ $item->id }}" method="POST" action="{{ route('incidents.authorizeIncident', ['incident' => $item->id]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="btn btn-success change-incident-status" onclick="confirmUpdate({{ $item->id }})"><i class="fas fa-check"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmUpdate(id) {
            if (confirm('¿Está seguro de actualizar el estado del incidente a reparación?')) {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                };
                document.getElementById('updateForm_' + id).submit();
            }
        }
    </script>
    @if (Session::has('created'))
        <script>
            toastr.success("Incidente agregado.");
        </script>
    @endif

    @if (Session::has('completeDiagnose'))
        <script>
            toastr.success("Incidente autorizado y listo para reparación");
        </script>
    @endif
</x-app-layout>
