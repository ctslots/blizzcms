<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title><?= $this->config->item('ProjectName'); ?> -</title>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="index.html" />
    <meta property="og:title" content="Blizzard Trackers" />
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url(); ?>assets/css/navbar0e26.css?v=58-88" />
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url(); ?>assets/css/main-1f799c9e0f0e27.css?v=58-88" />
    <!-- UiKit Start -->
<!-- UIkit CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>core/uikit/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="<?= base_url(); ?>core/uikit/js/uikit.min.js"></script>
<script src="<?= base_url(); ?>core/uikit/js/uikit-icons.min.js"></script>
<!-- UiKit end -->
    <!-- custom START -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/scroll.css">
    <!-- custom END -->

    <!-- custom footer -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <!-- custom footer -->
    <!--[if lte IE 8]>
        <script type="text/javascript" src="/<?= base_url(); ?>assets/js/jquery.min.js?v=88"></script>
    <![endif]-->
</head>

<body class="en-us Theme--<?= $this->m_general->getTheme(); ?> glass-header preload" lang="en" data-locale="en-gb" data-device="desktop" data-name="index">
    <!-- header -->
    <?php $this->load->view('general/icons'); ?>
    <!-- submenu -->
    </div>
    </div>
    </div>
    <!-- submenu -->

    <!-- main -->
    <div role="main">
        <section class="Tracker">
            <header class="Tracker-header">
                <div class="Container Container--content">
                    <div class="space-adaptive-medium"></div>
                    <br></br>
                    <h1 class="Tracker-heading" style="color: #fff;"><i class="bug icon"></i><?= $this->lang->line('bugtracker'); ?></h1>
                </div>
                <div class="Container Container--content">
                    <h3 class="flush-bottom flush-top text-upper text-heavy" style="color: #fff;"><?= $this->lang->line('report_list'); ?></h3>
                </div>
            </header>
            <div class="Tracker-content" data-track="nexus.checkbox" id="forum-topics">
                <!-- table -->
                <table class="uk-table uk-table-divider">
                    <?php if ($this->m_data->isLogged()) { ?>
                    <a href="#" uk-toggle="target: #createReport">
                        <button class="uk-button uk-button-primary"><?= $this->lang->line('create_report'); ?></button>
                    </a>
                    <?php } ?>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?= $this->lang->line('expr_title'); ?></th>
                            <th><?= $this->lang->line('type'); ?></th>
                            <th><?= $this->lang->line('expr_status'); ?></th>
                            <th><?= $this->lang->line('expr_priority'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($this->bugtracker_model->getBugtracker()->result() as $buglist) { ?>
                        <tr>
                                <td><a href="<?= base_url('bugtracker/post/'); ?><?= $buglist->id ?>">
                                    <?= $buglist->id ?>           
                                </a></td>
                                <td><a href="<?= base_url('bugtracker/post/'); ?><?= $buglist->id ?>">
                                    <span class="uk-label"><?= $buglist->title ?></span>            
                                </a></td>
                                <td><a href="<?= base_url('bugtracker/post/'); ?><?= $buglist->id ?>">
                                    <span class="uk-label uk-label-success"><?= $buglist->type ?></span>            
                                </a></td>
                                <td><a href="<?= base_url('bugtracker/post/'); ?><?= $buglist->id ?>">
                                    <span class="uk-label uk-label-warning"><?= $buglist->status ?></span>            
                                </a></td>
                                <td><a href="<?= base_url('bugtracker/post/'); ?><?= $buglist->id ?>">
                                    <span class="uk-label uk-label-warning"><?= $buglist->priority ?></span>            
                                </a></td>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <!-- table -->
            </div>
        </section>
    </div>


<!-- create report -->
<div id="createReport" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">
                <i class="fa fa-camera" aria-hidden="true"></i>
                Create Bug Report
            </h2>
        </div>
        <form action="" method="post" accept-charset="utf-8">
            <div class="uk-modal-body">
                <!-- content -->
                <form action="" method="post" accept-charset="utf-8">
                    <!-- title -->
                    <h2 class="uk-text-large"><?= $this->lang->line('expr_title'); ?></h2>
                    <div class="uk-margin">
                        <input name="bug_title" class="uk-input uk-form-width-large" required type="text" placeholder="<?= $this->lang->line('expr_title'); ?>">
                    </div>
                    <!-- title -->
                    <!-- text area -->
                    <script src="<?= base_url(); ?>core/ckeditor_basic/ckeditor.js"></script>

                    <br>

                    <div class="form-group">
                        <h2 class="uk-text-large"><?= $this->lang->line('new_desc'); ?></h2>
                        <div class="col-md-12">
                            <textarea required="" name="bug_description" id="ckeditor" rows="10" cols="80"></textarea>
                            <script>
                                CKEDITOR.replace('ckeditor');
                            </script>
                        </div>
                    </div>
                    <!-- text area -->
                </form>
                <!-- content -->
                <div class="uk-modal-footer uk-text-right actions">
                    <button class="uk-button uk-button-default uk-modal-close" type="button"><?= $this->lang->line('button_cancel'); ?></button>
                    <button class="uk-button uk-button-primary" type="submit" name="button_changeavatar"><?= $this->lang->line('button_change'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- php -->
<!-- php -->
<!-- create report end -->