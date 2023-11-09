<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-indigo-800 rounded-lg overflow-hidden shadow-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold text-center mb-4">¡Bienvenido/a {{ Auth::user()->name }}</h1>
                    @if ((Auth::user()->insurer_id))
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                            <div class="bg-blue-100 text-blue-800 p-4 rounded-lg">
                                <p class="text-xl sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-semibold">Usuarios
                                </p>
                                <p class="text-2xl sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold">{{ $userCount }}</p>
                            </div>

                            <div class="bg-green-100 text-green-800 p-4 rounded-lg">
                                <p class="text-xl sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-semibold">Talleres
                                </p>
                                <p class="text-2xl sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold">{{ $workCount }}</p>
                            </div>

                            <div class="bg-red-100 text-red-800 p-4 rounded-lg">
                                <p class="text-xl sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-semibold">
                                    Incidentes</p>
                                <p class="text-2xl sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold">{{ $incidentCount }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
