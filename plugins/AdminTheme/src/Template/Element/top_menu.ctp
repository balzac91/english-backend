<header class="main-header">
    <span class="logo">
        <span class="logo-lg"><b><?= __('Admin Panel'); ?></b></span>
    </span>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user small-user-icon"></i>

                        <span class="hidden-xs"><?= $loggedUser['login']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <i class="fa fa-user large-user-icon"></i>

                            <p>
                                <?= $loggedUser['login']; ?>
                                <small><?= __('Member since'); ?> <?= $this->Time->format($loggedUser['created'], \IntlDateFormatter::SHORT); ?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= $this->Html->link(__('Profile'), ['plugin' => false, 'controller' => 'Users', 'action' => 'view', 'prefix' => 'admin', $loggedUser['id']], ['class' => 'btn btn-default btn-flat']); ?>
                            </div>
                            <div class="pull-right">
                                <?= $this->Html->link(__('Sign out'), ['plugin' => false, 'controller' => 'Login', 'action' => 'logout', 'prefix' => false], ['class' => 'btn btn-default btn-flat']); ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>