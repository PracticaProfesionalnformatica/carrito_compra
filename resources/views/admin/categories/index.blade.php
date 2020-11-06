@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/fondo2.jpg') }}'); background-size: cover; background-position: top center;">
           
    
</div> 

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de categorías</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Nueva categoría</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-5 text-center">Descripción</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <img src="{{ $category->featured_image_url }}" height="50">
                                </td>
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <a href="#" rel="tooltip" title="Ver categoría" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar categoría" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
<!--<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://presentation.creative-tim.com">
                       About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                       Blog
                    </a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
        </div> 
    </div> 
</footer>-->


@endsection
