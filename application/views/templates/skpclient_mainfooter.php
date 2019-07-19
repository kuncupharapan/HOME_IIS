<footer class="footer">
    <div class="d-flex justify-content-center p-2">
        <span class="svgfooterbg text-t1greenmed">Tim Pengembang SI-TI PTIPK &copy; 2018-2019</span>
    </div>
</footer>
</body>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"><\/script>')</script>
<script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascript">
<?php
if ($mediaboxhover == 1) {
echo "$(\".medboxmoverwithaction\").on(\"mouseover\", function () {
        $(this).css({
            \"background-color\": \"#FC6F1F\"
        });
        $(this).find(\".medboxactionbar\").css({
            \"display\": \"block\",
            \"height\": \"150px\"
        });
    }).on(\"mouseleave\", function () {
        var styles = {
            backgroundColor: \"#FFFFFF\"
        };
        $(this).css(styles);
        $(this).find(\".medboxactionbar\").hide();
    });";    
}
?>
</script>
</html>