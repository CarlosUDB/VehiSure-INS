<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Completar requisición') }}

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
                        <th scope="col">Completar compra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requisitions as $item)
                        <tr>
                            <th>{{ $item->date }}</th>
                            <td>{{ $item->police_report_number }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->car_plate_number }}</td>
                            <td>
                                <a class="btn btn-success change-incident-status" data-incident-id="{{ $item->id }}"
                                    href="#" role="button"><i class="fas fa-check"></i></a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.querySelectorAll('.change-incident-status').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const incidentId = this.getAttribute('data-incident-id');

                fetch(`/incidents/requisition/complete/${incidentId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                    .then(response => {
                        window.location.reload();
                        console.log('Status changed');
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
            });
        });
    </script>


    @if (Session::has('completeDiagnose'))
        <script>
            toastr.success("Requisición actualizada.");
        </script>
    @endif
</x-app-layout>
