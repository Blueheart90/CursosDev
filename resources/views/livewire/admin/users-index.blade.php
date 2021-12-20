<div>
    <div class="card">
        <div class="card-header">
            <input wire:model='search' class="form-control w-100" placeholder="Escriba un nombre o email" type="search">
        </div>
        @if ($users->isEmpty())

            <div class="card-body">
                <i class="mr-2 fas fa-exclamation-circle"></i>
                <strong>
                    La busqueda no arrojó resultados
                </strong>
            </div>
        @else
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <div class="card-footer">
                {{ $users->links() }} 
            </div>
        @endif
    </div>
</div>
