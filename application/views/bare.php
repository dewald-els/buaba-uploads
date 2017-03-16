<!DOCTYPE html>
<html>
<head>
    <title>Bauba uploads | <?php echo $page_title; ?></title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.min.css'); ?>"/>

</head>
<body>


<?php foreach ($sub_views as $view): ?>
    <?php $this->load->view($view); ?>
<?php endforeach; ?>

<script src="<?php echo base_url('assets/lib/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
</body>
</html>