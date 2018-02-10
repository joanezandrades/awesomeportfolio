 <?php
/**
 * Awesome Portfolio footer.php
 *
 * @package Awesome Portfolio
 */
?>
    <footer id="footer" class="">
        <div class="container_footer container_one">        
            <div class="wrapper-footer">
                <p class="copyright">Joanez Andrades 2017, todos os direitos reservados</p>
            </div>

            <div class="wrapper-footer">
                <h3 class="title-newsletter">Newsletter</h3>
                <input class="newsletter-input" type="email" name="email" value="" placeholder="seu melhor e-mail">
            </div>
            <div class="wrapper-footer">
                <ul class="social-share">
                    <li class="social-item">
                        <i class="icon fa fa-twitter"></i>
                    </li>
                    <li class="social-item">
                        <i class="icon fa fa-facebook"></i>
                    </li>
                    <li class="social-item">
                        <i class="icon fa fa-instagram"></i>
                    </li> 
                </ul> <!-- /End social-share -->
            </div>
        </div>
    </footer>
    
    <!-- Redes sociais  -->
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>


    <?php 
        load_scripts_js();
        wp_footer();
    ?>
    
    </body>
</html>