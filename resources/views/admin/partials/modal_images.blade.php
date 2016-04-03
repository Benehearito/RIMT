<div class="modal fade" id="addimagesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Title</h4>
            </div>
            <div class="modal-body">
                <p>
                    {!! Form::select(
                                'album',
                                ['0'=>'Sin album']+$albums,
                                '',
                                array('class' => 'selectpicker',  'data-width'=>'180px','id' => 'album')
                    ) !!}
                </p>
                <div id="addImages"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="saveimages">Añadir imagenes</button>
            </div>
        </div>
    </div>
</div>