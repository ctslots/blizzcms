    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="fab fa-cc-paypal"></i> Vote</h3>
        <div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@l" uk-grid-parallax="translate:200">
         <?php foreach ($voteList as $key => $voteList): ?>
          <div>
            <div class="uk-card uk-card-secondary uk-card-body">
              <img src="<?= $voteList->image ?>">
              <span class="uk-badge"><?= $this->lang->line('panel_points'); ?> <?= $voteList->points ?></span>
              <hr class="uk-divider-icon">
              <p> Next vote in : </p>
                <h5><?= date('Y-m-d h:i:s A', $this->fxvote->getTimeLogExpired($this->session->userdata('fx_sess_id'), $voteList->id)) ?></h5>
              <?= form_open(base_url('vote/votenow/'.$voteList->id)); ?>
                <button class="uk-button uk-button-default uk-width-1-1"><?= $this->lang->line('nav_vote'); ?></button>
              <?= form_close(); ?>
            </div>
          </div>
            
          <?php endforeach; ?>
        </div>
      </div>
    </section>
