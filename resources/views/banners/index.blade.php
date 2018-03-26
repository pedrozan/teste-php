@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(Session::has('success_msg'))
                <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
            @endif
        <!-- Banners list -->
            @if(!empty($banners))
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Banners </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('banners.add') }}"> Criar Novo</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                            <th width="25%">Nome</th>
                            <th width="40%">Arquivo</th>
                            <th width="15%">Criado em</th>
                            <th width="20%">Ação</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$banner->name}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$banner->imagePath}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$banner->created_at}}</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('banners.details', $banner->id) }}" class="label label-success">Detalhes</a>
                                        <a href="{{ route('banners.edit', $banner->id) }}" class="label label-warning">Editar</a>
                                        <a href="{{ route('banners.delete', $banner->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection