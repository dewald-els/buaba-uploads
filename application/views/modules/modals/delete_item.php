<div id="delete-item-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete article</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this item?</p>
                <p><b>This will no longer be visible on the website if you continue.</b></p>
            </div>
            <div class="modal-footer">
                <form action="<?php echo site_url('login/logout'); ?>" method="post">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onclick="completeDelete()">Delete</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->