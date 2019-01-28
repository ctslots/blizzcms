    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-medium" data-uk-grid>
          <div class="uk-width-1-6@s uk-width-1-3@m"></div>
          <div class="uk-width-2-3@s uk-width-1-3@m">
            <h2 class="uk-h2 uk-text-center"><i class="fas fa-sign-in-alt"></i> <?= $this->lang->line('button_login'); ?></h2>
            <p class="uk-text-center"><?= $this->lang->line('login_description'); ?></p>

            <?php if(isset($_GET['password'])) {
              echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('password_error').'</p></div>';
            } ?>

            <?php if(isset($_GET['account'])) {
              echo '<div class="uk-alert-danger" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('account_error').'</p></div>';
            } ?>

            <div class="uk-margin" uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-inline; delay: 300; repeat: true">
              <div class="uk-form-controls uk-light">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon" uk-icon="icon: user"></span>
                  <?= form_input($username_form); ?>
                </div>
              </div>
            </div>
            <div class="uk-margin" uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-inline; delay: 300; repeat: true">
              <div class="uk-form-controls uk-light">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon" uk-icon="icon: lock"></span>
                  <?= form_input($password_form); ?>
                </div>
              </div>
            </div>
            <?= form_submit($submit_form); ?>
            <hr>
            <a href="<?= base_url('register'); ?>" class="uk-button uk-button-secondary uk-width-1-1" name="<?= $this->lang->line('no_account'); ?>"><i class="fas fa-user-plus"></i> <?= $this->lang->line('button_account_create'); ?></a>
          </div>
          <div class="uk-width-1-6@s uk-width-1-3@m"></div>
        </div>
      </div>
    </section>

    <script>
      $(document).ready(function(){
        $(document).on('click', '#button_log', function(){
          var username = $('#login_username').val();
          var password = $('#login_password').val();
          if(username == ''){
            $.amaran({
              'theme': 'awesome warning',
              'content': {
                title: '<?= $this->lang->line('notify_title_warning'); ?>',
                message: '<?= $this->lang->line('notify_username_empty'); ?>',
                info: '',
                icon: 'fas fa-exclamation-circle'
              },
              'position': 'top right',
              'inEffect': 'slideRight',
              'outEffect': 'slideRight'
            });
            return false;
          }
          if(password == ''){
            $.amaran({
              'theme': 'awesome warning',
              'content': {
                title: '<?= $this->lang->line('notify_title_warning'); ?>',
                message: '<?= $this->lang->line('notify_password_empty'); ?>',
                info: '',
                icon: 'fas fa-exclamation-circle'
              },
              'position': 'top right',
              'inEffect': 'slideRight',
              'outEffect': 'slideRight'
            });
            return false;
          }
          $.ajax({
            url:"<?= base_url('user/verify1'); ?>",
            method:"POST",
            data:{username:username, password:password},
            dataType:"text",
            success:function(){
              $.amaran({
                'theme': 'awesome ok',
                'content': {
                  title: '<?= $this->lang->line('notify_title_success'); ?>',
                  message: '<?= $this->lang->line('notify_connecting'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              window.location.href = '<?= base_url(); ?>';
            }
          });
        });
      });
    </script>
