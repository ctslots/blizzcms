    <div class="uk-container">
        <div class="uk-space-xlarge"></div>
        <div class="uk-grid uk-grid-large" data-uk-grid>
            <div class="uk-width-1-5@l"></div>
            <div class="uk-width-3-5@l">
                <div class="uk-principal-title uk-text-uppercase uk-text-white"><i class="far fa-question-circle"></i> <?= $this->lang->line('nav_faq'); ?></div>
                <div class="uk-space-medium"></div>
                <?php if($this->faq_model->getAll()->num_rows()) { ?>
                <div uk-grid>
                    <div class="uk-width-auto@m">
                        <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-fade">
                            <?php foreach($this->faq_model->getFaqType() as $type) { ?>
                            <li><a href="#" class="uk-text-white"><?= $type->title ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="uk-width-expand@m">
                        <ul id="component-tab-left" class="uk-switcher">
                            <?php foreach($this->faq_model->getFaqType() as $type) { ?>
                            <li class="uk-text-white">
                                <ul uk-accordion="multiple: true">
                                    <?php foreach($this->faq_model->getFaqList($type->id) as $list) { ?>
                                    <li>
                                        <a class="uk-accordion-title uk-text-white" href="#"><i class="fas fa-info-circle"></i> <?= $list->title ?></a>
                                        <div class="uk-accordion-content">
                                            <?= $list->description ?>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } else { ?>
                <div class="uk-alert-warning" uk-alert>
                    <p class="uk-text-center"><i class="fas fa-exclamation-triangle"></i> <?= $this->lang->line('faq_not_found'); ?></p>
                </div>
                <?php } ?>
            </div>
            <div class="uk-width-1-5@l"></div>
        </div>
