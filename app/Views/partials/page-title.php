<!-- start page title -->
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title"><?= $title ?></h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#"><?= $pagetitle ?></a></li>
                <?php if(isset($subtitle)):  ?>
                    <li class="breadcrumb-item"><a href="#"><?= $subtitle ?></a></li>
                <?php endif ?>
                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
            </ol>
        </div>