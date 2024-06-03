<div>
    <h2>Facturas</h2>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form method="get" wire:submit='search'>
            <input type="text" wire:model="nombreBuscar">
            <button class="btn btn-primary">Buscar cliente</button>
        </form>

        <button wire:click="create" class="btn btn-primary">
            </i> <i class="bi bi-plus-circle-fill"></i> Crear Factura
        </button>


    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Número</th>
                    <th>Detalles</th>
                    <th>Valor</th>
                    <th>Archivo</th>
                    <th>Cliente</th>
                    <th>Forma de Pago</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($facturas as $factura)
                    <tr wire:key="{{'factura-'.$factura->id }}">
                        <td>{{ $factura->id }}</td>
                        <td>{{ $factura->numero }}</td>
                        <td>{{ $factura->detalles }}</td>
                        <td>{{ $factura->valor }}</td>
                        <td><img src="{{ asset('storage/'.$factura->archivo) }}" alt=""></td>
                        <td>{{ $factura->cliente->nombre }}</td>
                        <td>{{ $factura->formapago->nombre }}</td>
                        <td>{{ $factura->estado->nombre }}</td>
                        <td>
                            <button wire:click="edit({{ $factura->id }})" class="btn btn-sm btn-primary me-2"
                                title="Editar">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                            <button wire:click="destroy({{ $factura->id }})" class="btn btn-sm btn-danger"
                                title="Eliminar">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No se encontraron facturas</td>
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
                        <h5 class="modal-title">Crear Factura</h5>
                        <button type="button" class="btn-close" aria-label="Close"
                            wire:click="$set('openCreate', false)"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit="store">
                            <div class="mb-3">
                                <label for="numeroCreate" class="form-label">Número</label>
                                <input type="text" class="form-control" id="numeroCreate"
                                    placeholder="Ingrese el número de factura..." wire:model.lazy="numeroCreate">
                                @error('numeroCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="detallesCreate" class="form-label">Detalles</label>
                                <textarea class="form-control" id="detallesCreate" rows="3" placeholder="Ingrese los detalles de la factura..."
                                    wire:model.lazy="detallesCreate"></textarea>
                                @error('detallesCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="valorCreate" class="form-label">Valor</label>
                                <input type="text" class="form-control" id="valorCreate"
                                    placeholder="Ingrese el valor de la factura..." wire:model.lazy="valorCreate">
                                @error('valorCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="archivoCreate" class="form-label">Archivo</label>
                                <input type="file" class="form-control" id="archivoCreate"
                                    placeholder="Seleccione un archivo..." wire:model.lazy="archivoCreate">
                                @error('archivoCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="clienteIdCreate" class="form-label">Cliente</label>
                                <select class="form-select" id="clienteIdCreate" wire:model.lazy="clienteIdCreate">
                                    <option value="">Seleccione un cliente</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('clienteIdCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formaPagoIdCreate" class="form-label">Forma de Pago</label>
                                <select class="form-select" id="formaPagoIdCreate" wire:model.lazy="formaPagoIdCreate">
                                    <option value="">Seleccione una forma de pago</option>
                                    @foreach ($formaspago as $formapago)
                                        <option value="{{ $formapago->id }}">{{ $formapago->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('formaPagoIdCreate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="estadoIdCreate" class="form-label">Estado</label>
                                <select class="form-select" id="estadoIdCreate" wire:model.lazy="estadoIdCreate">
                                    <option value="">Seleccione un estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('estadoIdCreate')
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
                        <h5 class="modal-title">Actualizar Factura</h5>
                        <button type="button" class="btn-close" aria-label="Close"
                            wire:click="$set('openUpdate', false)"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="update">
                            <div class="mb-3">
                                <label for="numeroUpdate" class="form-label">Número</label>
                                <input type="text" class="form-control" id="numeroUpdate"
                                    placeholder="Ingrese el número de factura..." wire:model.lazy="numeroUpdate">
                                @error('numeroUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="detallesUpdate" class="form-label">Detalles</label>
                                <textarea class="form-control" id="detallesUpdate" rows="3"
                                    placeholder="Ingrese los detalles de la factura..." wire:model.lazy="detallesUpdate"></textarea>
                                @error('detallesUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="valorUpdate" class="form-label">Valor</label>
                                <input type="text" class="form-control" id="valorUpdate"
                                    placeholder="Ingrese el valor de la factura..." wire:model.lazy="valorUpdate">
                                @error('valorUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="archivoUpdate" class="form-label">Archivo</label>
                                <input type="file" class="form-control" id="archivoUpdate"
                                    placeholder="Seleccione un archivo..." wire:model.lazy="archivoUpdate">
                                @error('archivoUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="clienteIdUpdate" class="form-label">Cliente</label>
                                <select class="form-select" id="clienteIdUpdate" wire:model.lazy="clienteIdUpdate">
                                    <option value="">Seleccione un cliente</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('clienteIdUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formaPagoIdUpdate" class="form-label">Forma de Pago</label>
                                <select class="form-select" id="formaPagoIdUpdate"
                                    wire:model.lazy="formaPagoIdUpdate">
                                    <option value="">Seleccione una forma de pago</option>
                                    @foreach ($formaspago as $formapago)
                                        <option value="{{ $formapago->id }}">{{ $formapago->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('formaPagoIdUpdate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="estadoIdUpdate" class="form-label">Estado</label>
                                <select class="form-select" id="estadoIdUpdate" wire:model.lazy="estadoIdUpdate">
                                    <option value="">Seleccione un estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('estadoIdUpdate')
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
