<div class="card">
    
    <div class="card-body">
    
        <h5><b> {{$Arusuarios->find($post->user_id)->name}}</b></h5>
        <p>
            <?php echo $post->conteudo; ?>
        </p>
        <hr>
        
        <a href="#comentarios-{{$post->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="comentarios-{{$post->id}}">
                Comentários ({{count($Arcomentarios->where('post_id',$post->id))}})
        </a>
        <div class="my-2 comentarios collapse" id="comentarios-{{$post->id}}">
            @if(count($Arcomentarios->where('post_id',$post->id))!=0)            
                @foreach($Arcomentarios->where('post_id',$post->id) as $c)    
                        @component('components.comentario',['autor'=>$Arusuarios->find($c->user_id)->name, 'conteudo'=>$c->conteudo])
                        @endcomponent       
                @endforeach
            @else 
                <div class="card my-1">
                    <div class="card-body">
                        Ainda nao há comentários por aqui. Seja o primeiro! 
                    </div>
                </div>
            @endif 
        </div>
        @auth
            <hr>
            <div>
                <form action="{{ route('comentario.store',$post->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="postagem" value="1">
                    <div class="form-group">
                        <label for="comentario">Novo comentário:</label>
                        <textarea name="comentario" id="comentario" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Salvar comentário</button>
                </form>
            </div>    
        @endauth
    </div>
    
</div>