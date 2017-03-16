<!DOCTYPE html>
<html>
<head>
    <title>Bauba uploads | <?php echo $page_title; ?></title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.min.css'); ?>"/>
    <?php foreach ($css as $stylesheet): ?>
        <link rel="stylesheet" href="<?php echo base_url($stylesheet); ?>" />
    <?php endforeach; ?>

</head>
<body>
<input type="hidden" id="site-url" value="<?php echo site_url(); ?>">

<?php $this->load->view('modules/navbar/index'); ?>
<?php $this->load->view('modules/modals/logout'); ?>
<?php $this->load->view('modules/modals/delete_item'); ?>
<?php $this->load->view('modules/modals/enable_item'); ?>

<?php foreach ($sub_views as $view): ?>
    <?php $this->load->view($view); ?>
<?php endforeach; ?>

<script src="<?php echo base_url('assets/lib/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

<?php foreach ($js as $script): ?>
    <script src="<?php echo base_url($script); ?>"></script>
<?php endforeach; ?>
</body>
</html>