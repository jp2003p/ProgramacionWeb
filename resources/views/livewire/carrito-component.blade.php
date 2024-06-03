<div>
    <div class="d-flex justify-content-end align-items-center mb-4">
        <div>
            @if (count($productos))
                <button class="btn btn-primary" wire:click='guardarPedido'>Ordenar</button>
            @endif
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($productos as $producto)
                    <tr wire:key="{{ $producto->id }}">
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>
                            <form id="form{{ $producto->id }}">
                                <input type="hidden" value="{{ $producto->id }}" id="idProducto">
                                <input type="number" id="inputCantidad" name="cantidad"
                                    value="{{ $producto->cantidad }}" onchange="enviarFormulario({{ $producto->id }})">
                            </form>
                        </td>
                        <td>{{ $producto->cantidad * $producto->precio }}</td>
                        <td>
                            <button class="btn btn-light" wire:click="delete({{ $producto->id }})"><i class="bi bi-x-lg"></i></button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay productos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end align-items-center mb-4">
        <span class="mx-5">Total: {{ $total }}</span>
        <button class="btn btn-danger mx-5" wire:click='vaciar'>Vaciar</button>
    </div>

    <script>
        function enviarFormulario(idProducto) {
            var form = document.getElementById('form' + idProducto);
            var inputCantidad = form.querySelector('input[name="cantidad"]');
            var cantidad = inputCantidad.value;
            var id = form.querySelector('#idProducto').value;

            Livewire.dispatch('update-value', {
                id: id,
                cantidad: cantidad
            });
        }
    </script>


</div>
