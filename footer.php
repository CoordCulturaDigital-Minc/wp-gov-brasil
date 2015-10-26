<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wp-gov-brasil
 */
?>
	</main>
	<footer id="main-footer" class="site-footer" role="contentinfo">

		<div class="footer-atalhos">
            <div class="container">
                <div class="pull-right voltar-ao-topo"><a href="#portal-siteactions"><i class="icon-chevron-up"></i><?php esc_html_e( '&nbsp;Voltar para o topo', 'wp-gov-brasil' ); ?></a></div>
            </div>
        </div>

    	<!-- Footer -->
        <div class="container container-menus">
            <div class="row footer-menus" role="contentinfo">
                <a name="afooter" id="afooter"></a>
                <span class="hide"><?php esc_html_e( 'Início da navegação de rodapé', 'wp-gov-brasil' ); ?></span>
                    
                <?php  wp_nav_menu( array( 'theme_location' => 'nav-footer' ) ); ?>

                <span class="hide"><?php esc_html_e( 'Fim da navegação de rodapé', 'wp-gov-brasil' ); ?></span> 

                <div class="clear"></div>
            </div>
        </div>

        <div id="" class="footer-logos">
            <div class="container">
                 <?php echo get_theme_mod( "wp_gov_brasil_footer_text", '
                    <div id="wrapper-footer-brasil">
                        <a href="http://www.acessoainformacao.gov.br/"><span class="logo-acesso-footer"></span></a>
                        <a href="http://www.brasil.gov.br/"><span class="logo-brasil-footer"></span></a>
                    </div>
                 ' ); ?>
            </div>           
        </div>
            
        
        <div class="footer-ferramenta">
            <div class="container">
                <p><?php printf( esc_html__( 'Desenvolvido com o CMS de código aberto %s', 'wp-gov-brasil' ), '<a href="' . esc_url( __( 'http://wordpress.org/', 'wp-gov-brasil' ) ) . '">Wordpress</a>' ); ?></p>
            </div>
        </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="http://barra.brasil.gov.br/barra.js?cor=verde" type="text/javascript"></script>
</body>
</html>
