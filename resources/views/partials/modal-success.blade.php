<div class="modal fade" id="modalSuccess">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-success text-uppercase" id="myModalLabel">Success <i class="fa fa-check fa-fw"></i></h3>
            </div>
            <div id='message' class="modal-body">
                {{ $message }}
            </div>
        </div>
    </div>
</div>

<script>
    $('#modalSuccess').modal('show');

    window.setTimeout(function (){
        $('#modalSuccess').modal('hide');
        window.history.pushState({}, null, window.location.pathname);
    },3000)
</script>
