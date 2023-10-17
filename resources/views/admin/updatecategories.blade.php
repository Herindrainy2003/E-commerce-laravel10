@extends('admin.layout')
@section('title')
Ajouter Categgories 
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- <form action="{{URL::to('updatecategories',$categories->id)
}}"  enctype="multipart/form-data"> 
    @csrf --}}
  
    <div class="animated fadeIn">
        <form action="{{route('categories.update',$categories->id)}}" method="POST" enctype="multipart/form-data"> 
           @csrf
          
        @method('PUT')
        <div class="row">
          <div class="col-lg-6">
              <div class="card">
                    <div class="card-header">
                                <strong class="card-title">CATEGORIES</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center"> categories Produit</h3>
                                        </div>
                                        <hr>
                                            <div class="form-group">
                                               Modifier categories
                                                <input  type="text" name="nomcategorie" class="form-control"  value="{{$categories->nomcategorie}}">
                                            </div>
                                         
                                            <button type="submit" class="btn btn-outline-primary">Modifier</button>
                                            </div>
                                       
                                    
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->
                        </div>
            </div>


        </div><!-- .animated -->
    </div><!-- .content -->

</form>
</div><!-- /#right-panel -->

<!-- Right Panel -->

@endsection()
