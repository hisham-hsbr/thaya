@extends('back_end.layouts.app')

@section('PageHead', 'Roles')

@section('PageTitle', 'Roles')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/users-management/roles">Roles</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-links.header-links-dataTable />
@endsection

@section('actionTitle', 'Roles Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Role Read')
                                <x-layouts.div-clearfix>
                                    <x-form.button-href button_type="" button_oneclick="" button_class="btn btn-primary"
                                        href="{{ route('roles.create') }}" button_icon="fa fa-add" button_name="Add" />
                                </x-layouts.div-clearfix>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            @can('Role Read')
                                                <th>Sn</th>
                                            @endcan
                                            @can('Role Read Name')
                                                <th>Name</th>
                                            @endcan
                                            @can('Role Read Users')
                                                <th>Users</th>
                                            @endcan
                                            @can('Role Read Permissions')
                                                <th>Permissions</th>
                                            @endcan
                                            @can('Role Read Status')
                                                <th>Status</th>
                                            @endcan
                                            @can('Role Read Created At')
                                                <th>Created At</th>
                                            @endcan
                                            @can('Role Read Updated At')
                                                <th>Updated At</th>
                                            @endcan
                                            @can('Role Read Created By')
                                                <th>Created By</th>
                                            @endcan
                                            @can('Role Read Updated By')
                                                <th>Updated By</th>
                                            @endcan
                                            @can('Role Edit')
                                                <th>Edit</th>
                                            @endcan
                                            @can('Role Delete')
                                                <th>Delete</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $key => $role)
                                            <tr>
                                                @can('Role Read')
                                                    <td>{{ ++$i }}</td>
                                                @endcan
                                                @can('Role Read Name')
                                                    <td>{{ $role->name }}</td>
                                                @endcan
                                                @can('Role Read Users')
                                                    <td><span class="badge badge-primary badge-pill">{{ $role->users->count() }}
                                                            Users</span></td>
                                                @endcan
                                                @can('Role Read Permissions')
                                                    <td> <span
                                                            class="badge badge-warning badge-pill">{{ $role->permissions->count() }}
                                                            Permissions</span></td>
                                                @endcan
                                                @can('Role Read Status')
                                                    <td>
                                                        @if ($role->status == '1')
                                                            <span
                                                                style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>
                                                        @else
                                                            <span
                                                                style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In
                                                                Active</span>
                                                        @endif
                                                    </td>
                                                @endcan
                                                @can('Role Read Created By')
                                                    <td>{{ $role->createdBy->name }}</td>
                                                @endcan
                                                @can('Role Read Updated By')
                                                    <td>{{ $role->updatedBy->name }}</td>
                                                @endcan
                                                @can('Role Read Created At')
                                                    <td>{{ $role->created_at->format('d-M-Y , h:i:s A') }}</td>
                                                @endcan
                                                @can('Role Read Updated At')
                                                    <td>{{ $role->updated_at->format('d-M-Y , h:i:s A') }}</td>
                                                @endcan
                                                @can('Role Edit')
                                                    <td>
                                                        <a href="{{ route('roles.edit', $role->id) }}" class="ml-2">
                                                            <i class="fa-solid fa-edit"></i>
                                                        </a>
                                                    </td>
                                                @endcan
                                                @can('Role Delete')
                                                    <td>
                                                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}"
                                                            onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn" type="submit"><i
                                                                    class="fa-solid fa-trash-can text-danger"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            @can('Role Read')
                                                <th>Sn</th>
                                            @endcan
                                            @can('Role Read Name')
                                                <th>Name</th>
                                            @endcan
                                            @can('Role Read Users')
                                                <th>Users</th>
                                            @endcan
                                            @can('Role Read Permissions')
                                                <th>Permissions</th>
                                            @endcan
                                            @can('Role Read Status')
                                                <th>Status</th>
                                            @endcan
                                            @can('Role Read Created At')
                                                <th>Created At</th>
                                            @endcan
                                            @can('Role Read Updated At')
                                                <th>Updated At</th>
                                            @endcan
                                            @can('Role Read Created By')
                                                <th>Created By</th>
                                            @endcan
                                            @can('Role Read Updated By')
                                                <th>Updated By</th>
                                            @endcan
                                            @can('Role Edit')
                                                <th>Edit</th>
                                            @endcan
                                            @can('Role Delete')
                                                <th>Delete</th>
                                            @endcan
                                        </tr>
                                    </tfoot>
                                </table>
                            @endcan
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')

    <x-message.message />

    <x-links.footer-links-dataTable /> />


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
