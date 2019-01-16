    <section class="uk-section uk-padding-remove slider-section">
      <div class="uk-background-secondary uk-background-cover forum-header">
        <div class="uk-container">
          <div class="uk-space-xlarge"></div>
          <h3 class="uk-h3 uk-text-uppercase"><i class="far fa-comments fa-lg"></i> <?= $this->lang->line('forum_welcome'); ?></h3>
          <div class="uk-space-xlarge"></div>
        </div>
      </div>
    </section>
    <section class="uk-section uk-section-xsmall default-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <?php foreach($this->forum_model->getCategory() as $categorys) { ?>
        <div class="ForumCategory">
          <?php if($this->forum_model->getCategoryRows($categorys->id)) { ?>
            <h4 class="uk-h4 uk-text-uppercase"><i class="far fa-bookmark"></i> <?= $categorys->categoryName ?></h4>
          <?php } ?>
          <div class="ForumCards" uk-scrollspy="cls: uk-animation-fade; repeat: true">
            <?php foreach($this->forum_model->getCategoryForums($categorys->id) as $sections) { ?>
            <?php if ($sections->type == 1 || $sections->type == 3) { ?>
            <a href="<?= base_url('forums'); ?>/category/<?= $sections->id ?>" class="ForumCard ForumCard--content">
              <i class="ForumCard-icon" style="background-image: url('<?= base_url();?>assets/images/forums/<?= $sections->icon ?>')"></i>
              <div class="ForumCard-details">
                <h1 class="ForumCard-heading"><?= $sections->name ?></h1>
                <span class="ForumCard-description"><?= $sections->description ?></span>
              </div>
            </a>
            <?php } else if($sections->type == 2) { ?>
              <?php if($this->m_data->isLogged()) { ?>
              <?php if($this->m_data->getRank($this->session->userdata('fx_sess_id')) > 0) { ?>
                <a href="<?= base_url('forums'); ?>/category/<?= $sections->id ?>" style="border-color: #00aeff; border-radius: 10px;" class="ForumCard ForumCard--content">
                  <i class="ForumCard-icon" style="background-image: url('<?= base_url();?>assets/images/forums/icons/<?= $sections->icon ?>')"></i>
                  <div class="ForumCard-details">
                    <h1 class="ForumCard-heading"><?= $sections->name ?></h1>
                    <span class="ForumCard-description"><?= $sections->description ?></span>
                  </div>
                </a>
              <?php } ?>
              <?php } ?>
            <?php } ?>
            <?php } ?>
          </div>
        </div>
        <div class="uk-space-large"></div>
        <?php } ?>
      </div>
    </section>
