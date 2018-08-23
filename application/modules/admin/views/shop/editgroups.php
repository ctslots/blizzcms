<?php if(isset($_POST['button_updateItem'])) {
    $group   = $_POST['groupname'];

    $this->admin_model->updateSpecifyGroup($idlink, $group);
} ?>

    <div id="content" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand">
            <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid>
                <div class="uk-width-1-1@l uk-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-header uk-card-secondary">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom"><a href="<?= base_url('admin/managegroups'); ?>"><span data-uk-icon="icon: arrow-left; ratio: 1.5"></span></a><?= $this->lang->line('panel_admin_edit_group'); ?></h4></div>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off">
                                <div class="uk-margin">
                                    <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_group_title'); ?></label>
                                    <div class="uk-form-controls">
                                        <div class="uk-inline uk-width-1-1">
                                            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: pencil"></span>
                                            <input class="uk-input" name="groupname" type="text" value="<?= $this->admin_model->getGroupName($idlink); ?>" placeholder="<?= $this->lang->line('form_group_title'); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <button class="uk-button uk-button-primary uk-width-1-1" name="button_updateItem" type="submit"><i class="fas fa-sync-alt"></i> <?= $this->lang->line('button_save'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
