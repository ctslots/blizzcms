<!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title"></div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?= $this->lang->line('news_list'); ?></h3>
                            <p class="text-muted m-b-30"></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->admin_model->getAdminNewsList()->result() as $news) { ?>
                                        <tr>
                                            <td><a href="<?= base_url(); ?>admin/nlist/<?= $news->id ?>" title="<?= $news->title ?>"><?= $news->title ?></a></td>
                                            <td><a href="<?= base_url(); ?>admin/nlist/<?= $news->id ?>" title="<?= $news->date ?>"><?= $news->date ?></a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->