@extends('admin.layouts.layout')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Publicações</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="{{route('publication.create')}}" class="btn btn-outline-secondary active" role="button" aria-pressed="true">
                        <span data-feather="plus"></span>
                        Cadastrar Publicação
                    </a>
            </div>
        </div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Link</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Imagem</th>
                </tr>
            </thead>
            <tbody>
                @foreach($publications as $publication)
                    <tr>
                        <td>{{$publication->title}}</td>
                        <td>{{$publication->slug}}</td>
                        <td>{{$publication->description}}</td>
                        <td class="text-center">
                            <a href="{{asset('upload/publication') . '/' . $publication->image}}" target="_blank" class="btn btn-outline-secondary active" role="button" aria-pressed="true">
                                <span data-feather="image"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
