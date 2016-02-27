<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Words', 'action' => 'index', 'prefix' => 'admin']); ?>" class="dashboard-panel-link">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?= __('Words'); ?></span>
                    <span class="info-box-number"><?= $this->Number->format($wordsNumber); ?></span>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Categories', 'action' => 'index', 'prefix' => 'admin']); ?>" class="dashboard-panel-link">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-tags"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?= __('Categories'); ?></span>
                    <span class="info-box-number"><?= $this->Number->format($categoriesNumber); ?></span>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Levels', 'action' => 'index', 'prefix' => 'admin']); ?>" class="dashboard-panel-link">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-graduation-cap"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?= __('Levels'); ?></span>
                    <span class="info-box-number"><?= $this->Number->format($levelsNumber); ?></span>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'ProposedTranslations', 'action' => 'index', 'prefix' => 'admin']); ?>" class="dashboard-panel-link">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?= __('Proposed Translations'); ?></span>
                    <span class="info-box-number"><?= $this->Number->format($proposedTranslationsNumber); ?></span>
                </div>
            </div>
        </a>
    </div>
</div>
