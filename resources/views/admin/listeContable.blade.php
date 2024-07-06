@extends('layouts.Admin.master')

@section('content')
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Accented Table</h6>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contables as $contable)
                        <tr>
                            <td>{{ $contable->user->name }}</td>
                            <td>{{ $contable->user->email }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('contable.edit', ['id' => $contable->id]) }}"
                                    class="btn btn-primary text-white btn-sm me-1">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                <form action="{{ route('contable.destroy', ['id' => $contable->user->id]) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce comptable ?')">
                                        <i class="fas fa-trash-alt"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
