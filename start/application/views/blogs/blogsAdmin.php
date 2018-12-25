<?php $this->load->view("shared/header.php");?>

<body>

    <?php $this->load->view("shared/nav2.php");?>

    <div class="container-fluid">

        <?php if( $this->session->flashdata('error') !='' ):?>
        <div class="row margin-top-20">
            <div class="col-md-12">
                <div class="alert alert-danger margin-bottom-0">
                    <button type="button" class="close fui-cross" data-dismiss="alert"></button>
                    <?php echo $this->session->flashdata('error');?>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <?php endif;?>

        <div class="row" style="margin-top: 51px;">
            <div class="col-md-3 col-sm-4 text-right">

            </div>
            <!-- /.col -->
            <div class="col-md-9 col-sm-8">
                <h1><span class="fui-book"></span> <?php echo $this->lang->line('blogs_header')?></h1>
            </div>
        </div>
        <hr class="dashed">
        <div class="row">
            <?php
                foreach ($blogs as $blog): ?>
                    <div class="col-md-3 col-sm-4">
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <h2><?php echo $blog->title; ?></h2>
                        <a href="<?php echo site_url('blogs/create/'.$blog->blogs_id)?>"><span class="fui-new"></span> Изменить</a>
                        <a href="<?php echo site_url('blogs/delete/'.$blog->blogs_id)?>"><span class="fui-trash"></span> Удалить</a>
                    </div>
                    <?php
                endforeach;
            ?>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3 col-sm-4 text-right">

            </div>
            <div class="col-md-2 col-sm-2">
                <a href="<?php echo site_url('blogs/create')?>" class="btn btn-primary btn-embossed btn-block"><span class="fui-plus"></span> Создать статью</a>
            </div>
        </div>
    </div>
    <!-- /.container -->

</body>

</html>
