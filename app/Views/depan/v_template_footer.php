</div>
</div>
</div>
<!-- Footer-->
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php
                helper('global_fungsi_helper');

                $konfigurasi_name = "set_socials_twitter";
                $dataSocial = konfigurasi_get($konfigurasi_name);
                $twitter = $dataSocial['konfigurasi_value'];

                $konfigurasi_name = "set_socials_facebook";
                $dataSocial = konfigurasi_get($konfigurasi_name);
                $facebook = $dataSocial['konfigurasi_value'];

                $konfigurasi_name = "set_socials_instagram";
                $dataSocial = konfigurasi_get($konfigurasi_name);
                $instagram = $dataSocial['konfigurasi_value'];
                ?>
                <ul class="list-inline text-center">
                    <?php if ($twitter) : ?>
                        <li class="list-inline-item">
                            <a href="<?php echo $twitter ?>" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($facebook) : ?>
                        <li class="list-inline-item">
                            <a href="<?php echo $facebook ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($instagram) : ?>
                        <li class="list-inline-item">
                            <a href="<?php echo $instagram ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="small text-center text-muted fst-italic mt-4">Copyright &copy; Tokioshy 2024</div>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?php echo base_url('depan') ?>/js/scripts.js"></script>
</body>

</html>