@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Kelola Manajemen User</h1>
@stop

@section('content')
    <div class="d-flex justify-content-end pb-3">
        <x-adminlte-button label="Tambah User" data-toggle="modal" data-target="#modalPurple" class="bg-primary"/>
    </div>
    <table class="table table-striped table-borderless table-paginate w-100">
        {{--            {{var_dump(session('user'))}}--}}
        <thead>
        <tr>
            <th scope="col align-middle">Nama Lengkap</th>
            <th scope="col align-middle">Email</th>
            <th scope="col align-middle">Role</th>
            <th scope="col align-middle">Aksi</th>
        </tr>
        </thead>
    </table>
    {{-- Themed --}}
    <x-adminlte-modal id="modalPurple" title="Tambah User" theme="blue"
                      icon="fas fa-user" size='lg'>
        {{-- With label, invalid feedback disabled and form group class --}}
        <div class="row">
            <x-adminlte-input name="iLabel" label="Nama Lengkap" placeholder="Tuliskan Nama Lengkap"
                              fgroup-class="col-md-12" disable-feedback/>
        </div>
        <div class="row">
            <x-adminlte-input name="iLabel" label="Email" placeholder="Tuliskan Email"
                              fgroup-class="col-md-12" disable-feedback/>
        </div>
        <div class="row">
            <x-adminlte-input type="password" name="iLabel" label="Password" placeholder="Tuliskan Password"
                              fgroup-class="col-md-12" disable-feedback/>
        </div>
        <div class="row">
            <x-adminlte-select label="Role" name="optionsTest1" fgroup-class="col-md-12">
                <x-adminlte-options :options="['Kasir', 'Super Admin', 'Staff Keuangan']" disabled="1"
                                    empty-option="Select an option..."/>
            </x-adminlte-select>
        </div>
    </x-adminlte-modal>
    {{-- Example button to open modal --}}
@stop

@section('js')
    <script>
        const table = $('.table-paginate').DataTable( {
            scrollX: true,
            processing: true,
            searching: true,
            ajax: {
                url: "{{url("admin/listUser")}}"
            },
            columns: [
                {
                    data: 'name',
                    render: function (data) {
                        console.log(data);
                        if (data) {
                            return data;
                        } else {
                            return '~';
                        }
                    }
                },
                {
                    data: 'email',
                    render: function (data) {
                        if (data) {
                            return data;
                        } else {
                            return '~';
                        }
                    }
                },
                {
                    data: 'role',
                    render: function (data) {
                        if (data) {
                            if (data == 2) {
                                return 'Super Admin';
                            } else if (data == 1) {
                                return 'Staff Keuangan'
                            } else {
                                return 'Kasir'
                            }
                        } else {
                            return '~';
                        }
                    }
                },
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return `<button class="bg-transparent border-0" type="button" data-bs-toggle="modal" data-bs-target="#Detail" onclick="">
                            <i class="far fa-eye"></i> View
                        </button>`;
                    }
                }
            ]
        } );
    </script>
@stop
