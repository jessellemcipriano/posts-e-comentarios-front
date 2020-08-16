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
        @auth
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('post.store') }}" method="POST">
                    @csrf
                        <div class="card-header">Criar nova postagem</div>
                        <div class="card-body">
                            <label for="conteudo">Postagem</label>
                            <textarea name="conteudo" id="conteudo" rows="10" cols="80" ></textarea>
                        </div>
                        <div class="card-footer d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endauth
        @guest
        @if(count($Arposts)==0)
            <div class="col-12">
                <div class="card">
                    <div class="card-body" align="center">                        
                            <h5><b>Não há postagens. Entre e seja o primeiro!</b></h5>      
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-chat-left-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v11.586l2-2A2 2 0 0 1 4.414 11H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>                  
                    </div>
                </div>
            </div>
        @endif
        @endguest

        @auth 
        @if(count($Arposts)==0)
            <div class="col-12">
                <div class="card">
                    <div class="card-body" align="center">                        
                            <h5><b>Não há postagens. Seja o primeiro!</b></h5>      
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-chat-left-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v11.586l2-2A2 2 0 0 1 4.414 11H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>                  
                    </div>
                </div>
            </div>
        @endif
        @endauth






        <div class="col-md-6 col-6">
            @if(count($Arposts)!=0)
                
                    
                @foreach($Arposts->split(2)[0] as $c)
                    @component('components.post',['Arusuarios'=>$Arusuarios, 'post'=>$c, 'Arcomentarios'=>$Arcomentarios])                    
                    @endcomponent

                    </br>
                   
                    
                @endforeach
            @endif            
        </div>



        <div class="col-md-6 col-6">
            @if(count($Arposts) >= 2 )
               
                @foreach($Arposts->split(2)[1] as $c)
                @component('components.post',['Arusuarios'=>$Arusuarios, 'post'=>$c, 'Arcomentarios'=>$Arcomentarios])                    
                    @endcomponent
                    </br>
                     
                @endforeach
            @endif
        </div>


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
