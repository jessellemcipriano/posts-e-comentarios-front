
@extends('layouts.app')

@section('style')
    <style>
        .col-12{
            margin:10px 0;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
      
            <div class="col-12">
                <div class="card">   
                     <div class="card-body" align="center">  


<svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>

        
           <br>
<h3>{{Auth::user()->name}}</h3>
<h5>{{Auth::user()->email}}</h5>
<h7>Perfil Criado em {{Auth::user()->created_at}}</h7>


                         
</div>
</div>
<br>
@foreach($Arposts as $c)
@if($c->user_id == Auth::user()->id )
<div class="p-3 mb-5 bg-secondary text-white"  align="center" ><h2>Meus Posts</h2></div>
@break;
@endif


@endforeach
</div>
</div>


                    
                
            </div>   


<div class="container">
    <div class="row">
@foreach($Arposts as $c)

@if($c->user_id == Auth::user()->id )



   @if(($c->id)%2==0)
            <div class="col-md-6 col-12">
             <div class="card text-center" style="width: 34rem;">
             <div class="card border-secondary md-3" style="width: 34rem;">
                <div class="card-body">
                <div class="card-header">
                             <h5><b>{{Auth::user()->name}}</b></h5>
                     </div>
    
                    <ul class="list-group list-group-flush">
                     <li class="list-group-item"><?php echo $c->conteudo; ?></li>
                     </ul>
                    <a> Criado em: <?php echo $c->created_at; ?></a>
                </div>
              </div>
            </div>
            </div>
              
            
        @endif





  





        @if(($c->id)%2!=0)
        <div class="col-md-6 col-12">
             <div class="card text-center" style="width: 34rem;">
             <div class="card border-secondary md-3" style="width: 34rem;">
                <div class="card-body">
                <div class="card-header">
                <h5><b>{{Auth::user()->name}}</b></h5>
                     </div>
                   
    
                 
    
                    <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $c->conteudo; ?></li>
    </ul>
                    <a> Criado em: <?php echo $c->created_at; ?></a>
                </div>
              </div>
            </div>
            </div>
             @endif
@endif
@endforeach

    </div>
</div>
@endsection

@section('script')
    <script>
        window.onload = function(){ 
            CKEDITOR.replace('conteudo')
            CKEDITOR.config.height = 100;
        }
    </script>
@endsection
