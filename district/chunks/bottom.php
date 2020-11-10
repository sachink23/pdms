
<?php if (isset($_SESSION["PAGE_INFO_EXISTS"])): ?>
    <div class="alert alert-<?= $_SESSION["PAGE_INFO_TYPE"] ?>" role="alert">
        <strong><?= $_SESSION["PAGE_INFO"] ?></strong>
    </div>
    <?php clearPageInfo(); endif; ?>
</div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; 2020
            </div>
            <div class="col-sm-6 text-right">
                Developed by NIC Parbhani
            </div>
        </div>
    </div>
</footer>


</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/theme-assets/js/main.js"></script>


</body>
</html>


