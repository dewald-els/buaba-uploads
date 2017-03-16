<div class="container">


    <h1>Upload a new document</h1>
    <h4>Use this page to upload new documents for the news and investors' pages.</h4>

    <br>

    <?php if ($this->session->flashdata('form_errors')) : ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Complete the form</h4>
            <?php echo $this->session->flashdata('form_errors'); ?>
        </div>
    <?php endif; ?>

    <?php echo form_open_multipart('upload/save');?>

        <div class="row">
            <div class="col-xs-12 col-md-6">


                <fieldset>
                    <legend>Article detail</legend>

                    <div class="form-group">
                        <label for="upload-section" data-container="body" title="What's the section?"
                               data-toggle="popover"
                               data-trigger="hover" data-placement="right"
                               data-content="The section determines the location on the website. You can choose between the News page or the Investor page.">
                            Article section&nbsp;
                            <i class="fa fa-question-circle"></i></label>
                        <select class="form-control" name="upload_section" id="upload-section">
                            <option value="news">News</option>
                            <option value="investor">Investor news</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="upload-title" data-container="body" title="What's the title?" data-toggle="popover"
                               data-trigger="hover" data-placement="right"
                               data-content="The title displays as the link to the article. It is also the heading shown once the article has been opened.">
                            Title&nbsp;&nbsp;<i class="fa fa-question-circle"></i></label>
                        <input id="upload-title" type="text" class="form-control" name="title"
                               placeholder="Enter a title for the news article" maxlength="128" size="128" required/>
                    </div>
                    <div class="form-group">
                        <label for="upload-summary" data-container="body" title="What's the summary?"
                               data-toggle="popover"
                               data-trigger="hover" data-placement="right"
                               data-content="The summary of an article is the short piece of introduction text displayed in the article list before opening.">
                            Summary
                            &nbsp;&nbsp;<i class="fa fa-question-circle"></i>
                        </label>
                        <input id="upload-news-summary" type="text" class="form-control" name="summary"
                               placeholder="Enter a summary for the news article" maxlength="128" size="128" required/>
                    </div>
                    <div class="form-group">
                        <label for="upload-content">Content&nbsp;&nbsp;<i
                                    class="fa fa-question-circle"></i></label>
                        <textarea id="upload-news-content" name="article_content" rows="5" class="form-control"
                                  placeholder="Enter content displayed on the news page" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="upload-date">Set the upload date</label>
                        <div class="input-group date">
                            <input type="text" class="form-control" value="<?php echo date('d-m-Y'); ?>" name="date_created" required>
                            <div class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                </fieldset>

            </div>
            <div class="col-xs-12 col-md-6">
                <fieldset>
                    <legend>Documents</legend>

                    <input type="hidden" id="num-of-files" name="num_of_files" value="1">

                    <div class="well">
                        <ul style="margin-bottom: 0;">
                            <li><i class="fa fa-comments"></i> Choose a maximum of <b>3</b> files to upload.</li>
                            <li><i class="fa fa-folder-open"></i> Files must be no larger than <b>3mb</b>.</li>
                            <li><i class="fa fa-file"></i> Supported file types: <b>pdf, jpg and png</b>.</li>
                        </ul>
                    </div>


                    <h4>Add files</h4>
                    <button id="add-file-upload" type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> New file</button>

                    <br><br>

                    <div class="file-uploads">
                        <div class="form-group file-upload">
                            <label for="">File 1</label> <br>
                            <input type="file" name="document1" id="document1" style="display: inline-block">
                        </div>
                    </div>

                </fieldset>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button class="btn btn-primary">Save</button>
            </div>
        </div>

    </form>


</div>
