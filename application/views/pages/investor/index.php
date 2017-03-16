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
            </tr>
        <?php endfor; ?>
        </tbody>

    </table>
</div>
