<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    [
                        'label' => 'Номенклатура',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
							['label' => 'Единицы', 'icon' => 'file-code-o','url' => ['/item']],
							['label' => 'Группы','icon' => 'sitemap', 'url' => ['/product-group']],
							['label' => 'Товары', 'icon' => 'file-code-o','url' => ['/product']],
						],
					],
                    [
                        'label' => 'Информация',
                        'icon' => 'info',
                        'url' => '#',
                        'items' => [
							['label' => 'Главная', 'icon' => 'cog','url' => ['/app-site']],
							['label' => 'Тесты', 'icon' => 'bolt','url' => ['app-site/test']],
							['label' => 'СПб данные', 'icon' => 'institution','url' => ['app-site/api']],
						],
					],
                     [
                        'label' => 'Tools',
                        'icon' => 'bicycle',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Vue', 'icon' => 'cogs', 'url' => ['app-site/test'],],
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                         ],
                    ],
                   ['label' => 'Login', 'url' => ['app-site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
