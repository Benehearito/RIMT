@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <p>Por favor corrige los errores</p>
    </div>
@elseif (Session::has('message')) 
 	<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif
