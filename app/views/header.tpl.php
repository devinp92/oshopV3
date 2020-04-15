<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= $viewVars['baseUri']?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $viewVars['baseUri']?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $viewVars['baseUri']?>/assets/css/styles.css">
    <title>oShop</title>
</head>

<body>
    <header>
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-7 d-none d-sm-block">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item pr-3 mr-0">
                                <i class="fa fa-phone"></i> 01 02 03 04 05
                            </li>
                            <li class="list-inline-item px-3 border-left d-none d-lg-inline-block">Livraison offerte à partir de 100€</li>
                        </ul>
                    </div>
                    <div class="col-sm-5 d-flex justify-content-end">
                        <!-- Currency Dropdown-->
                        <div class="dropdown pl-3 ml-0">
                            <a id="currencyDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle topbar-link">EUR</a>
                            <div aria-labelledby="currencyDropdown" class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item text-sm">USD</a>
                                <a href="#" class="dropdown-item text-sm">GBP</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <?php require __DIR__.'/nav.tpl.php'; ?>
    </header>