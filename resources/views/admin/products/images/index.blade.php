@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/fondo2.jpg') }}'); background-size: cover; background-position: top center;">
           
    
</div> 

<div class="main main-raised">
    <div class="container">
       

        <div class="section text-center">
            <h2 class="title">Imágenes del producto "{{ $product->name }}" </h2>

           
            <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <input type="file" name="photo" required>    
                 <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
                <a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Volver al listado de productos</a>
            </form>
            <hr>

                <div class="row">
                  @foreach ($images as $image)   
                  <div class="col-md-4">
                     <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="{{ $image->url }}" width="350">
                            <form method="post" action="">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="image_id" value="{{ $image->id }}">


                                <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                             @if ($image->featured)
                                <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada actualmente">
                                    <i class="material-icons">favorite</i>
                                </button>
                            @else
                                <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">favorite</i>
                                </a>
                            @endif
                        
                                
                            </form>
                             
                        </div>
                    </div>
                  </div>  
                  @endforeach
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
