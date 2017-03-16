<div class="container">


    <h1>Uploaded investor news articles</h1>
    <h4>These are investor news articles that have been uploaded.</h4>

    <hr>

    <table class="table table-striped" id="news-table" cellspacing="0" width="100%">

        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Year</th>
            <th>Date added</th>
            <th>Active</th>
            <th>&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        <?php for ($i = 0; $i < count($investor_news); $i++): ?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $investor_news[$i]->investor_news_title; ?></td>
                <td><?php echo $investor_news[$i]->year; ?></td>
                <td><?php echo date('d M Y', strtotime($investor_news[$i]->date_created)); ?></td>
                <td><?php echo $investor_news[$i]->is_active == 1 ? 'Yes' : 'No'; ?></td>
                <?php if ($investor_news[$i]->is_active == 1): ?>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="disableItem(<?php echo $investor_news[$i]->investor_news_id; ?>)"><i class="fa fa-trash"></i></button></td>
                <?php else: ?>
                    <td><button type="button" class="btn btn-success btn-sm" onclick="enableItem(<?php echo $investor_news[$i]->investor_news_id; ?>)"><i class="fa fa-check-circle"></i></button></td>
                <?php endif; ?>
            </tr>
        <?php endfor; ?>
        </tbody>

    </table>
</div>
