<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Datos</th>
            <th class='text-center'>Roles</th>
            <th class='text-center'>Estado</th>
            <th class='text-right'>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr data-id="{{ $user->id }}">
                <th scope="row">{{$user->id}}</th>
                <td>
                    {{$user->name}}<br/>
                    {{$user->email}}
                </td>
                <th class='text-center'>
                    {{$user->role}}
                </th>
                <td class='text-center'>
                    @if ($user->registration_token!=null)
                       Sin validar
                    @elseif ($user->banned)
                        Banneado
                    @else
                        Activo
                    @endif
                    {{$user->activo}}
                </td>
                <td class='text-right'>
                    <a class="btn btn-info" href="{{route('admin.users.edit', $user->id)}}" role="button">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    @if ($user->banned)
                        <a class="btn btn-warning btnbanAct" id="btnbanAct{{ $user->id }}" href="#">
                            <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                        </a>
                        <a class="btn btn-success btnbanDes" id="btnbanDes{{ $user->id }}" style="display:none" href="#">
                            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                        </a>
                    @else
                        <a class="btn btn-warning btnbanAct" id="btnbanAct{{ $user->id }}" style="display:none" href="#">
                            <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                        </a>
                        <a class="btn btn-success btnbanDes" id="btnbanDes{{ $user->id }}" href="#">
                            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                        </a>
                    @endif


                    <a class="btn btn-danger btndelete" href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>