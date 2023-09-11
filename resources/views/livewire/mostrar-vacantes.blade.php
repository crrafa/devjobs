<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div
                class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{route('vacantes.show',$vacante->id)}}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">Ultimo dia: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-col md:flex-row items-stretch gap-3 items-center md:mt-0 mt-5">
                    <a href="{{route('candidatos.index',$vacante)}}"
                        class="bg-slate-800 py-2 px-4 rounded-lg text-white text-center text-xs font-bold uppercase">
                        {{$vacante->candidatos->count()}}
                        Candidatos
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-center text-xs font-bold uppercase">
                        Editar
                    </a>
                    <button wire:click="$dispatch('alertaEliminar',{id: {{$vacante->id}}})"
                        class="bg-red-800 py-2 px-4 rounded-lg text-white text-center text-xs font-bold uppercase">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse
    </div>
    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>
@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
  Livewire.on('alertaEliminar',vacanteId=>{
/*     alert(vacante_id.id); */
    Swal.fire({
            title: '¿Eliminar Vacante?',
            text: "Una vacante eliminada o se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText:'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('eliminarVacante',{'vacante':vacanteId});
                Swal.fire(
                    'Eliminada',
                    'La vacante fue eliminada.',
                    'success'
                )
            }
        }) 
    
  })


    </script>
@endpush
