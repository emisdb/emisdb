<aside class="main-sidebar">

    <section class="sidebar">

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
                        'label' => 'Книги',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
							['label' => 'Авторы', 'icon' => 'file-code-o','url' => ['/book/test-author']],
							['label' => 'Жанры','icon' => 'sitemap', 'url' => ['/book/test-category']],
							['label' => 'Книги+', 'icon' => 'file-code-o','url' => ['/book/test-book']],
						],
					],
                    [
                        'label' => 'Информация',
                        'icon' => 'info',
                        'url' => '#',
                        'items' => [
							['label' => 'Главная', 'icon' => 'cog','url' => ['/book']],
							['label' => 'Тесты', 'icon' => 'bolt','url' => ['book/book']],
							['label' => 'СПб данные', 'icon' => 'institution','url' => ['/book/default/spb']],
						],
					],
//                     [
//                        'label' => 'Академия',
//                        'icon' => 'building',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Home', 'icon' => 'cogs', 'url' => ['/academ'],],
//                            ['label' => 'Базы', 'icon' => 'cogs', 'url' => ['/academ-bases'],],
//                            ['label' => 'Товары', 'icon' => 'file-code-o', 'url' => ['/academ-product'],],
//                            ['label' => 'Наименования', 'icon' => 'file-code-o', 'url' => ['/academ-product-name'],],
//                            ['label' => 'Количество', 'icon' => 'file-code-o', 'url' => ['/academ-number'],],
//                         ],
//                    ],
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
