    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="ra ra-arena"></i> {nav_arena_statistics}</h3>
        <span class="uk-label uk-text-bold uk-label-danger">{lang_2v2}</span>
        <ul uk-tab="connect: #2v2statistics; {uk-tab}">
          <?php foreach ($realms as $charsMultiRealm): ?>
            <li><a class="uk-text-bold"><span uk-icon="icon: server"></span> <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?></a></li>
          <?php endforeach ?>
        </ul>
        <ul id="2v2statistics" class="uk-switcher">
            <?php foreach ($realms as $charsMultiRealm):
              $multiRealm = $this->m_data->getRealmConnectionData($charsMultiRealm->id);
            ?>
            <li>
              <div class="uk-overflow-auto uk-width-1-1 uk-margin">
                <table class="uk-table uk-table-divider">
                  <thead>
                    <tr>
                      <th class="uk-width-small"><i class="fas fa-sitemap"></i> {column_team_name}</th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-users"></i> {column_members}</th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_rating');?></th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_games');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($this->arena_model->getTopArena2v2($multiRealm)->result() as $tops2v2): ?>
                      <tr>
                        <td><?=$tops2v2->name?></td>
                        <td class="uk-text-center">
                          <?php foreach ($this->arena_model->getMemberTeam($tops2v2->arenaTeamId, $multiRealm)->result() as $mmberteam): ?>
                          <img class="uk-border-circle" src="<?= base_url('assets/images/class/'.$this->m_general->getClassIcon($this->arena_model->getRaceGuid($mmberteam->guid, $multiRealm))) ?>" title="<?= $this->arena_model->getNameGuid($mmberteam->guid, $multiRealm) ?>"  width="30px" height="30px" uk-tooltip="pos: bottom">
                          <?php endforeach ?>
                        </td>
                        <td class="uk-text-center"><?=$tops2v2->rating?></td>
                        <td class="uk-text-center"><?=$tops2v2->seasonWins?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </li>
          <?php endforeach ?>
        </ul>
        <span class="uk-label uk-text-bold uk-label-warning">{lang_3v3}</span>
        <ul uk-tab="connect: #3v3statistics; {uk-tab}">
          <?php foreach ($realms as $charsMultiRealm): ?>
            <li><a class="uk-text-bold"><span uk-icon="icon: server"></span> <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?></a></li>
          <?php endforeach ?>
        </ul>
        <ul id="3v3statistics" class="uk-switcher">
            <?php foreach ($realms as $charsMultiRealm):
              $multiRealm = $this->m_data->getRealmConnectionData($charsMultiRealm->id);
            ?>
            <li>
              <div class="uk-overflow-auto uk-width-1-1 uk-margin">
                <table class="uk-table uk-table-responsive uk-table-divider">
                  <thead>
                    <tr>
                      <th class="uk-width-small"><i class="fas fa-sitemap"></i> {column_team_name}</th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-users"></i> {column_members}</th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_rating');?></th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_games');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($this->arena_model->getTopArena3v3($multiRealm)->result() as $tops3v3): ?>
                      <tr>
                        <td><?=$tops3v3->name?></td>
                        <td class="uk-text-center">
                          <?php foreach ($this->arena_model->getMemberTeam($tops3v3->arenaTeamId, $multiRealm)->result() as $mmberteam): ?>
                          <img class="uk-border-circle" src="<?= base_url('assets/images/class/'.$this->m_general->getClassIcon($this->arena_model->getRaceGuid($mmberteam->guid, $multiRealm))) ?>" title="<?= $this->arena_model->getNameGuid($mmberteam->guid, $multiRealm) ?>"  width="30px" height="30px" uk-tooltip="pos: bottom">
                          <?php endforeach ?>
                        </td>
                        <td class="uk-text-center"><?=$tops3v3->rating?></td>
                        <td class="uk-text-center"><?=$tops3v3->seasonWins?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </li>
          <?php endforeach ?>
        </ul>
        <span class="uk-label uk-text-bold uk-label-success">{lang_5v5}</span>
        <ul uk-tab="connect: #3v3statistics; {uk-tab}">
          <?php foreach ($realms as $charsMultiRealm): ?>
            <li><a class="uk-text-bold"><span uk-icon="icon: server"></span> <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?></a></li>
          <?php endforeach ?>
        </ul>
        <ul id="3v3statistics" class="uk-switcher">
            <?php foreach ($realms as $charsMultiRealm):
              $multiRealm = $this->m_data->getRealmConnectionData($charsMultiRealm->id);
            ?>
            <li>
              <div class="uk-overflow-auto uk-width-1-1 uk-margin">
                <table class="uk-table uk-table-responsive uk-table-divider">
                  <thead>
                    <tr>
                      <th class="uk-width-small"><i class="fas fa-sitemap"></i> {column_team_name}</th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-users"></i> {column_members}</th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_rating');?></th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-chart-line"></i> <?=$this->lang->line('column_games');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($this->arena_model->getTopArena5v5($multiRealm)->result() as $tops5v5): ?>
                      <tr>
                        <td><?=$tops5v5->name?></td>
                        <td class="uk-text-center">
                          <?php foreach ($this->arena_model->getMemberTeam($tops5v5->arenaTeamId, $multiRealm)->result() as $mmberteam): ?>
                          <img class="uk-border-circle" src="<?= base_url('assets/images/class/'.$this->m_general->getClassIcon($this->arena_model->getRaceGuid($mmberteam->guid, $multiRealm))) ?>" title="<?= $this->arena_model->getNameGuid($mmberteam->guid) ?>"  width="30px" height="30px" uk-tooltip="pos: bottom">
                          <?php endforeach ?>
                        </td>
                        <td class="uk-text-center"><?=$tops5v5->rating?></td>
                        <td class="uk-text-center"><?=$tops5v5->seasonWins?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    </section>
