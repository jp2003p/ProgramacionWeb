<div>
    <h2>Clientes</h2>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <form method="get" wire:submit='search'>
            <input type="text" wire:model="nombreBuscar">
            <button class="btn btn-primary">Buscar cliente</button>
        </form>

        <button wire:click="create" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill"></i> Crear Cliente
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>RFC</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                    <tr wire:key="{{ $cliente->id }}">
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->rfc }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>
                            <button wire:click="edit({{ $cliente->id }})" class="btn btn-sm btn-primary me-2"
                                title="Editar">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                            <button wire:click="destroy({{ $cliente->id }})" class="btn btn-sm btn-danger"
                                title="Eliminar">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No se encontraron clientes</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($openCreate)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Agregar Cliente</h5>
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
                            <div class="mb-3">
                                <label for="rfcCreate" class="form-label">RFC</label>
                                <input type="text" class="form-control" id="rfcCreate"
                                    placeholder="Ingrese el RFC..." wire:model.lazy="rfcCreate">
                                @error('rfcCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="direccionCreate" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccionCreate"
                                    placeholder="Ingrese la dirección..." wire:model.lazy="direccionCreate">
                                @error('direccionCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telefonoCreate" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefonoCreate"
                                    placeholder="Ingrese el teléfono..." wire:model.lazy="telefonoCreate">
                                @error('telefonoCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emailCreate" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailCreate"
                                    placeholder="Ingrese el email..." wire:model.lazy="emailCreate">
                                @error('emailCreate')
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
                        <h5 class="modal-title">Actualizar Cliente</h5>
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
                            <div class="mb-3">
                                <label for="rfcUpdate" class="form-label">RFC</label>
                                <input type="text" class="form-control" id="rfcUpdate"
                                    placeholder="Ingrese el RFC..." wire:model.lazy="rfcUpdate">
                                @error('rfcUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="direccionUpdate" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccionUpdate"
                                    placeholder="Ingrese la dirección..." wire:model.lazy="direccionUpdate">
                                @error('direccionUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telefonoUpdate" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefonoUpdate"
                                    placeholder="Ingrese el teléfono..." wire:model.lazy="telefonoUpdate">
                                @error('telefonoUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emailUpdate" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailUpdate"
                                    placeholder="Ingrese el email..." wire:model.lazy="emailUpdate">
                                @error('emailUpdate')
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

</div>
