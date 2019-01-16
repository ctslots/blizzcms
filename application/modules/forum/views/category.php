<?php if($this->m_permissions->getIsAdmin($this->session->userdata('fx_sess_id'))) { ?>
    <script src="<?= base_url(); ?>core/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({
        selector: '.tinyeditor',
        language: '<?= $this->config->item('tinymce_language'); ?>',
        menubar: false,
        plugins: ['advlist autolink autosave link image lists charmap preview hr searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media table contextmenu directionality emoticons textcolor paste fullpage textcolor colorpicker textpattern'],
        toolbar: 'insert unlink emoticons | undo redo | formatselect fontselect fontsizeselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | blockquote | removeformat'});
    </script>
<?php } else { ?>
    <script src="<?= base_url(); ?>core/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({
        selector: '.tinyeditor',
        language: '<?= $this->config->item('tinymce_language'); ?>',
        menubar: false,
        plugins: ['advlist autolink autosave link image lists charmap preview hr searchreplace wordcount visualblocks visualchars code fullscreen media table contextmenu directionality emoticons textcolor paste fullpage textcolor colorpicker textpattern'],
        toolbar: 'insert unlink emoticons | undo redo | fontselect fontsizeselect | bold italic | forecolor | bullist numlist outdent indent | link unlink | removeformat'});
    </script>
<?php } ?>

    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small" data-uk-grid>
          <div class="uk-width-expand">
            <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="fas fa-list"></i> <?= $this->forum_model->getCategoryName($idlink); ?></h3>
          </div>
          <div class="uk-width-auto">
            <?php if($this->m_data->isLogged()) { ?>
            <div class="uk-text-center uk-text-right@s">
              <a href="#" class="uk-button uk-button-default" uk-toggle="target: #newTopic"><i class="fas fa-pencil-alt"></i> <?= $this->lang->line('button_new_topic'); ?></a>
            </div>
            <?php } ?>
          </div>
        </div>
        <p class="uk-text-uppercase uk-text-bold"><?= $this->lang->line('forum_topic_list'); ?></p>
        <div class="Forum-ForumTopicList" uk-scrollspy="cls: uk-animation-fade; repeat: true">
          <?php foreach($this->forum_model->getSpecifyCategoryPostsPined($idlink)->result() as $lists) { ?>
          <a class="ForumTopic ForumTopic--sticky" style="border-color: #00aeff;" href="<?= base_url('forums'); ?>/topic/<?= $lists->id ?>">
            <span class="ForumTopic-type">
              <span uk-icon="icon: star"></span>
            </span>
            <span class="ForumTopic-details">
              <span class="ForumTopic-heading">
                <span class="ForumTopic-title--wrapper">
                  <span class="ForumTopic-title">
                    <?= $lists->title; ?>
                  </span>
                </span>
              </span>
              <?php if($this->m_data->getRank($lists->author) > 0) { ?>
                <span class="ForumTopic-author ForumTopic-author-staff"><?= $this->m_data->getUsernameID($lists->author); ?></span>
              <?php } else { ?>
                <span class="ForumTopic-author"><?= $this->m_data->getUsernameID($lists->author); ?></span>
              <?php } ?>
              <span class="ForumTopic-timestamp"><?= date('d-m-Y', $lists->date); ?></span>
              <span class="ForumTopic-replies">
                <span uk-icon="icon: commenting; ratio: 0.9"></span>&nbsp;<?= $this->forum_model->getComments($lists->id)->num_rows(); ?>
              </span>
            </span>
          </a>
          <?php } ?>
          <hr>
          <?php foreach($this->forum_model->getSpecifyCategoryPosts($idlink)->result() as $lists) { ?>
          <a class="ForumTopic" href="<?= base_url('forums'); ?>/topic/<?= $lists->id ?>">
            <span class="ForumTopic-type">
              <span uk-icon="icon: comments"></span>
            </span>
            <span class="ForumTopic-details">
              <span class="ForumTopic-heading">
                <span class="ForumTopic-title--wrapper">
                  <span class="ForumTopic-title">
                    <?= $lists->title; ?>
                  </span>
                </span>
              </span>
              <?php if($this->m_data->getRank($lists->author) > 0) { ?>
                <span class="ForumTopic-author ForumTopic-author--blizzard"><?= $this->m_data->getUsernameID($lists->author); ?></span>
              <?php } else { ?>
                <span class="ForumTopic-author"><?= $this->m_data->getUsernameID($lists->author); ?></span>
              <?php } ?>
              <span class="ForumTopic-timestamp"><?= date('d-m-Y', $lists->date); ?></span>
              <span class="ForumTopic-replies">
                <span uk-icon="icon: commenting; ratio: 0.9"></span>&nbsp;<?= $this->forum_model->getComments($lists->id)->num_rows(); ?>
              </span>
            </span>
          </a>
          <?php } ?>
        </div>
      </div>
    </section>
