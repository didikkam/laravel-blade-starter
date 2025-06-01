@extends('layouts.admin')

@section('title', 'Users Management')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endpush

@section('breadcrumb')
    <nav class="flex justify-between items-center" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <i class="fas fa-home text-base align-middle"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-base text-gray-400 mx-2 align-middle"></i>
                    <span class="text-sm font-medium text-gray-500 ml-2">Users</span>
                </div>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Users List</h2>
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                <i class="fas fa-plus text-base align-middle mr-2"></i>
                Create User
            </a>
        </div>

        <div class="overflow-x-auto">
            <table id="users-table" class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Roles</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    let usersTable;
    
    $(document).ready(function() {
        usersTable = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: "{{ route('admin.users.index') }}",
            columns: [
                { 
                    data: null,
                    searchable: false,
                    orderable: false,
                    className: 'px-2 py-2 whitespace-nowrap text-sm text-gray-900 text-center',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { 
                    data: 'roles',
                    name: 'roles',
                    orderable: false,
                },
                { data: 'created_at', name: 'created_at' },
                { 
                    data: 'id', 
                    name: 'action',
                    orderable: false, 
                    searchable: false,
                    render: function(data, type, row) {
                        const showUrl = "{{ route('admin.users.show', ':id') }}".replace(':id', row.id);
                        const editUrl = "{{ route('admin.users.edit', ':id') }}".replace(':id', row.id);
                        
                        return `
                            <div class="flex space-x-2">
                                <a href="${showUrl}" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye w-5 h-5 text-base align-middle"></i>
                                </a>
                                <a href="${editUrl}" class="text-yellow-600 hover:text-yellow-800">
                                    <i class="fas fa-edit w-5 h-5 text-base align-middle"></i>
                                </a>
                                <button onclick="deleteUser(${row.id})" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash-alt w-5 h-5 text-base align-middle"></i>
                                </button>
                            </div>
                        `;
                    }
                }
            ]
        });
    });

    function deleteUser(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/users/${id}`,
                    type: 'DELETE',
                    success: function(response) {
                        showResponse.show(response);
                        usersTable.ajax.reload();
                    }
                });
            }
        });
    }
</script>
@endpush 