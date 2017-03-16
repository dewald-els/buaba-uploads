<div class="container">


    <h1>Uploaded news articles</h1>
    <h4>These are news articles that have been uploaded.</h4>

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
        <?php for ($i = 0; $i < count($news); $i++): ?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $news[$i]->news_title; ?></td>
                <td><?php echo $news[$i]->year; ?></td>
                <td><?php echo date('d M Y', strtotime($news[$i]->date_created)); ?></td>
                <td><?php echo $news[$i]->is_active == 1 ? 'Yes' : 'No'; ?></td>
            </tr>
        <?php endfor; ?>
        </tbody>

    </table>

</div>
