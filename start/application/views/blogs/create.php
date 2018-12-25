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
            <div class="col-md-6 col-sm-8">
                <h1><span class="fui-book"></span> <?php echo $this->lang->line('blogs_creatingnewblog')?></h1>
            </div>
            <!-- /.col -->
        </div>
        <hr class="dashed">
        <div class="row" style="margin-top: 51px;">
            <div class="col-md-3 col-sm-4 text-right">
            </div>
            <!-- /.col -->
            <div class="col-md-9 col-sm-8">
                <form action="" method="post">
                    <input type="text" name="blogs_id" value="<?php if(isset($blog->blogs_id)) echo $blog->blogs_id; ?>" hidden>
                    <input type="text" class="form-control" name="title" placeholder="Заголовок" value="<?php if(isset($blog->title)) echo $blog->title; ?>"><br>
                    <textarea name="description_short" class="form-control" id="description_short" cols="30" rows="10" placeholder="Краткое описание"><?php if(isset($blog->description_short)) echo $blog->description_short; ?></textarea><br>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Полное описание"><?php if(isset($blog->description)) echo $blog->description; ?></textarea>
                    <input type="text" class="form-control" name="meta_keys" placeholder="Мета ключи (через запятую)" value="<?php if(isset($blog->meta_keys)) echo $blog->meta_keys; ?>"><br>
                    <input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="<?php if(isset($blog->meta_description)) echo $blog->meta_description; ?>"><br>
                    <input type="submit" name="" value="Сохранить">
                </form>
            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->



    <!-- Load JS here for greater good =============================-->
    <script src="<?php echo base_url();?>js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap-switch.js"></script>
    <script src="<?php echo base_url();?>js/flatui-checkbox.js"></script>
    <script src="<?php echo base_url();?>js/flatui-radio.js"></script>
    <script src="<?php echo base_url();?>js/jquery.tagsinput.js"></script>
    <script src="<?php echo base_url();?>js/flatui-fileinput.js"></script>
    <script src="<?php echo base_url();?>js/jquery.placeholder.js"></script>
    <script src="<?php echo base_url();?>js/jquery.zoomer.js"></script>
    <script src="<?php echo base_url();?>js/application.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('description_short');
    </script>

</body>

</html>
