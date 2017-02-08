<div class="container-fluid menu-principal menu-principal-geral">

    <div class="row">

        <nav  id="menu-geral" class="navbar navbar-default navbar-fixed-top"  data-spy="affix"  >

            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
                        <img class="logo" src="<?php uri() ?>/img/logo@3x.png">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php
                wp_nav_menu(array(
                    'menu' => 'principal',
                    'theme_location' => 'principal',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'bs-example-navbar-collapse-1',
                   
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                    'walker' => new wp_bootstrap_navwalker())
                );
                ?>

            </div><!-- /.container-fluid -->
        </nav>

    </div>

</div><!-- menu-principal -->