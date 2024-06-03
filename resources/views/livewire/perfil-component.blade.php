<div>
    <h2>Perfiles</h2>
    <div class="d-flex justify-content-between align-items-center mb-4">

        <form method="get" wire:submit='search'>
            <input type="text" wire:model="nombrePerfilBuscar">
            <button class="btn btn-primary" id="btn_buscar" wire:key="btn_buscar">Buscar</button>
        </form>

        <button wire:click="create" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill"></i> Crear Perfil
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($perfiles as $perfil)
                    <tr wire:key="{{ $perfil->id }}">
                        <td>{{ $perfil->id }}</td>
                        <td>{{ $perfil->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $perfil->id }})" class="btn btn-sm btn-primary me-2"
                                title="Editar">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                            <button id="delete" class="btn btn-sm btn-danger" title="Eliminar">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No se encontraron perfiles</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $perfiles->links() }}

    @if ($openCreate)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Agregar Perfil</h5>
                        <button type="button" class="btn-close" aria-label="Close"
                            wire:click="$set('openCreate', false)"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="store">
                            <div class="mb-3">
                                <label for="nombreCreate" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombreCreate"
                                    placeholder="Ingrese el nombre..." wire:model.lazy="nombreCreate">
                                @error('nombreCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                wire:click="$set('openCreate', false)">Cerrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif


    @if ($openUpdate)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Actualizar Perfil</h5>
                        <button type="button" class="btn-close" aria-label="Close"
                            wire:click="$set('openUpdate', false)"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="update">
                            <div class="mb-3">
                                <label for="nombreUpdate" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombreUpdate"
                                    placeholder="Ingrese el nombre..." wire:model.lazy="nombreUpdate">
                                @error('nombreUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                wire:click="$set('openUpdate', false)">Cerrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif

    {{--
    @push('script')
        <script>
            const btnDelete = document.getElementById('delete');

            btnDelete.addEventListener('click', function() {
                Swal.fire({
                    title: '¿Deseas solicitar este servicio?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            '¡Solicitud enviada!',
                            'Tu solicitud para el servicio ha sido enviada.',
                            'success'
                        );

                        const confirmButton = Swal.getConfirmButton();

                        

                        confirmButton.addEventListener('click', () => {
                            
                        });


                    } else {
                        Swal.fire(
                            'Solicitud cancelada',
                            'Tu solicitud para el servicio ha sido cancelada.',
                            'info'
                        );
                    }
                });
            });
        </script>
    @endpush
    --}}

</div>
