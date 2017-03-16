<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Successfully added article.</h1>
            <h4>You have successfully added a new article.</h4>
        </div>
    </div>


    <?php if ($this->session->flashdata('article')): ?>

        <div class="row">

            <div class="col-xs-12">

                <br>

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Article summary
                        </div>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item">
                            Title: <?php echo $this->session->flashdata('article')['title']; ?>
                        </div>
                        <div class="list-group-item">
                            <b>Documents</b>
                        </div>
                        <?php foreach ($this->session->flashdata('article')['documents'] as $file): ?>
                            <div class="list-group-item">
                                <?php echo $file['orig_name']; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

        </div>

    <?php endif; ?>


    <div class="row">

        <div class="col-xs-12">

            <br>

            <div class="well">
                <i class="fa fa-info-circle"></i> Please note that the server may take up to 5 minutes to process your upload.
            </div>

            You can <a target="_blank" href="http://www.baubaplatinum.co.za/">view your article</a> online.

            <br><br>

            <a role="button" href="<?php echo site_url('upload'); ?>" class="btn btn-success">Done</a>

        </div>

    </div>
</div>