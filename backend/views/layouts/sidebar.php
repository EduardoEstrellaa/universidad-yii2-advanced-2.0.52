<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UNIVERSIDAD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= Yii::$app->request->baseUrl ?>/img/profile_pictures/edu.jpeg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">EDUARDO ESTRELLA</a>
            </div>
        </div>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= Yii::$app->request->baseUrl ?>/img/profile_pictures/jovis.jpeg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">JOHANA OLIVO</a>
            </div>
        </div>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= Yii::$app->request->baseUrl ?>/img/profile_pictures/gama.jpeg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">GEOVANNI PÉREZ</a>
            </div>
        </div>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= Yii::$app->request->baseUrl ?>/img/profile_pictures/cristo.jpeg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">CRISTOFER POOL</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Starter Pages',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ]
                    ],
                    ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],

                    ['label' => '========EJERCICIOS DB========', 'header' => true],
                    [
                        'label' => 'TRANSACCIONES Y TRIGGERS',
                        'items' => [

                            [
                                'label' => 'Estudiantes',
                                'icon' => 'users',
                                'url' => ['estudiantes/index'],  // Ajusta esta URL según el controlador y acción correspondientes
                            ],
                            [
                                'label' => 'Pagos',
                                'icon' => 'users',
                                'url' => ['pagos/index'],  // Ajusta esta URL según el controlador y acción correspondientes
                            ],
                            [
                                'label' => 'Inscripciones Cursos',
                                'icon' => 'users',
                                'url' => ['inscripciones-cursos/index'],  // Ajusta esta URL según el controlador y acción correspondientes
                            ],
                        ]
                    ],




                    [
                        'label' => 'SUBCONSULTAS Y PROCEDIMINTOS ALMACENADOS',
                        'items' => [
                            [
                                'label' => 'EJERCICIO 1',
                                'iconStyle' => 'far',
                                'url' => ['ejercicio1/ejercicio1'],
                            ],
                            [
                                'label' => 'EJERCICIO 2',
                                'iconStyle' => 'far',
                                'url' => ['ejercicio2/ejercicio2'],
                            ],
                            [
                                'label' => 'EJERCICIO 3',
                                'iconStyle' => 'far',
                                'url' => ['ejercicio3/ejercicio3'],
                            ],
                            [
                                'label' => 'EJERCICIO 4',
                                'iconStyle' => 'far',
                                'url' => ['ejercicio4/ejercicio4'],
                            ],
                            [
                                'label' => 'EJERCICIO 5',
                                'iconStyle' => 'far',
                                'url' => ['ejercicio5/ejercicio5'],
                            ],
                        ]
                    ],

                    ['label' => 'TRIGGERS'],

                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>