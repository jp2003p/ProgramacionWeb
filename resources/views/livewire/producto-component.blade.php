<div>
    <h2>Productos</h2>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Agregar</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($productos as $producto)
                    <tr wire:key="{{ $producto->id }}">
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>
                            <button class="btn btn-warning" wire:click='agregar({{ $producto->id }})'><i class="bi bi-cart"></i> Agregar</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay productos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{$productos->links()}}

    </div>
</div>
