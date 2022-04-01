<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn btn-link" data-dismiss="modal" >X</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                {{ Form::open(array('id'=>'modal-form-delete', 'class'=>'form-inline','method'=>'post')) }}
                    {{ Form::token() }}
                    {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cerrar')}}</button>&nbsp;
                    <button type="submit" id="modal-del" class="btn btn-danger">{{__('Borrar')}}</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
