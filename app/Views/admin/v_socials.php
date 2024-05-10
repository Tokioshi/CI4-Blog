<div class="card-header">
    <i class="fas fa-table me-1"></i>
    <?php echo $templateJudul ?>
</div>
<div class="card-body">
    <?php
    $session = \Config\Services::session();
    if ($session->getFlashdata('warning')) {
    ?>
        <div class="alert alert-warning">
            <ul>
                <?php
                foreach ($session->getFlashdata('warning') as $val) {
                ?>
                    <li><?php echo $val ?></li>
                <?php
                }
                ?>
            </ul>
        </div>
    <?php
    }
    if ($session->getFlashdata('success')) {
    ?>
        <div class="alert alert-success"><?php echo $session->getFlashdata('success') ?></div>
    <?php
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="input_set_socials_twitter" class="form-label">Twitter</label>
            <input type="text" class="form-control" id="input_set_socials_twitter" name="set_socials_twitter" value="<?php echo (isset($set_socials_twitter)) ? $set_socials_twitter : "" ?>">
        </div>
        <div class="mb-3">
            <label for="input_set_socials_facebook" class="form-label">Facebook</label>
            <input type="text" class="form-control" id="input_set_socials_facebook" name="set_socials_facebook" value="<?php echo (isset($set_socials_facebook)) ? $set_socials_facebook : "" ?>">
        </div>
        <div class="mb-3">
            <label for="input_set_socials_instagram" class="form-label">Instagram</label>
            <input type="text" class="form-control" id="input_set_socials_instagram" name="set_socials_instagram" value="<?php echo (isset($set_socials_instagram)) ? $set_socials_instagram : "" ?>">
        </div>
        <div>
            <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
        </div>
    </form>
</div>