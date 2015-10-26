<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wp-gov-brasil
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="shortcut icon" href="../images/icons/favicon.ico" type="image/x-icon">

<?php wp_head(); ?>

<?php global $themename, $shortname; ?>
</head>

<body <?php body_class("template-view portaltype-collective-cover-content"); ?>>

<!-- barra do governo -->
<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;"> 
<ul id="menu-barra-temp" style="list-style:none;">
    <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"><a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a></li> 
    <li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a></li>
</ul>
</div>
<!-- fim barra do governo -->

<div id="page" class="hfeed site">

    <!-- HEADER -->
    <header id="main-header" role="banner" >

        <div class="container" style="background-image: url(<?php if (get_header_image() != '') header_image(); ?>);">

            <div class="row accessibility-language-actions-container ">
            
                <div class="col-md-6 accessibility-container no-padding">
                    <ul id="accessibility">
                        <li><a accesskey="1" href="#acontent" id="link-conteudo"><?php esc_html_e( 'Ir para o conteúdo', 'wp-gov-brasil' ); ?><span>1</span></a></li>
                        <li><a accesskey="2" href="#anavigation" id="link-navegacao"><?php esc_html_e( 'Ir para o menu', 'wp-gov-brasil' ); ?><span>2</span></a></li>
                        <li><a accesskey="3" href="#SearchableText" id="link-buscar"><?php esc_html_e( 'Ir para a busca', 'wp-gov-brasil' ); ?><span>3</span></a></li>
                        <li class="last-item"><a accesskey="4" href="#afooter" id="link-rodape"><?php esc_html_e( 'Ir para o rodapé', 'wp-gov-brasil' ); ?><span>4</span></a></li>
                    </ul>
                </div>

                <div class="col-md-6 language-and-actions-container no-padding">
                    <!--
                    <ul id="language">
                        <li class="language-es"><a href="#">Espa&#241;ol</a></li>
                        <li class="language-en"><a href="#">English</a></li>
                     </ul> -->

                    <ul id="portal-siteactions" class="pull-right">
                        <li id="siteaction-accessibility">
                            <a href="#" title="Acessibilidade" accesskey="5"><?php esc_html_e( 'Acessibilidade', 'wp-gov-brasil' ); ?></a>
                        </li>
                        <li id="siteaction-contraste">
                            <a href="#" class="toggle-contraste" title="Alto Contraste" accesskey="6"><?php esc_html_e( 'Alto Contraste', 'wp-gov-brasil' ); ?></a>
                        </li>
                        <li id="siteaction-mapadosite" class="last-item">
                            <a href="#" title="Mapa do Site" accesskey="7"><?php esc_html_e( 'Mapa do Site', 'wp-gov-brasil' ); ?></a>
                        </li>
                    </ul>
                </div> <!-- fim div.col-md-6 -->  
            </div> <!-- fim .row -->

            <div class="row">
                <div id="logo" class="col-sm-8 col-md-8">

                    <a id="portal-logo" title="<?php echo bloginfo( 'description' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    	<?php if( ( get_theme_mod( 'wp_gov_brasil_logo', false ) ) ) : ?>
                    		<div class="logo-img">
    							<img src="<?php echo get_theme_mod( 'wp_gov_brasil_logo' ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
    						</div>
    					<?php endif; ?>
                    </a>

                    <div class="logo-text">
                        <span id="portal-title-1"><?php echo get_theme_mod( $shortname ."_denominacao" ); ?></span>
                        <h1 id="portal-title-1" class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </h1>
                        <span id="portal-description"><?php echo get_theme_mod( $shortname ."_subordinacao" ); ?></span>
                        <span class="site-description"><?php bloginfo( 'description' ); ?></span>
                    </div>

                </div>

                <div class="col-sm-4 col-md-4 "> 
                    <div id="portal-searchbox" class="row">

                        <form action="<?php echo home_url( '/' ); ?>" class="pull-right">
                            <fieldset>
                                <legend class="hide">Busca</legend>
                                <h2 class="hidden">Buscar no portal</h2>
                                <div class="">
                                    <label for="portal-searchbox-field" class="hide">Busca: </label>
                                    <input type="text" id="portal-searchbox-field" class="searchField form-control" placeholder="Buscar no portal" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" name="s" value="<?php echo get_search_query() ?>">      
                                    <button type="submit" class="btn searchButton"><span class="hide">Buscar</span><i class="icon-search"></i></button>
                                </div>                                  
                            </fieldset>
                        </form>

                    </div>
              
                    <div id="social-icons" class="row">

                        <h2 class="hidden">Redes Sociais</h2>

                        <ul class="pull-right">
                            <?php $perfil_facebook = get_theme_mod( $shortname . "_facebook" ); ?>
                            <?php if( !empty( $perfil_facebook ) ) :  ?>
                                <li id="portalredes-facebooks" class="portalredes-item">
                                    <a href="<?php echo $perfil_facebook; ?>" title="Facebook" target="_blank" id="icon-facebook">
                                        <i class="fa fa-facebook-official"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php $perfil_twitter = get_theme_mod( $shortname . "_twitter" ); ?>
                            <?php if( !empty( $perfil_twitter ) ) :  ?>
                                <li id="portalredes-twitter" class="portalredes-item">
                                    <a href="<?php echo $perfil_twitter; ?>" target="_blank" title="Twitter">
                                        <i class="fa fa-twitter-square"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php $perfil_youtube = get_theme_mod( $shortname . "_youtube" ); ?>
                            <?php if( !empty( $perfil_youtube ) ) :  ?>
                                <li id="portalredes-youtube" class="portalredes-item">
                                    <a href="<?php echo $perfil_youtube; ?>" target="_blank" title="YouTube">
                                        <i class="fa fa-youtube-square"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php $perfil_google_plus = get_theme_mod( $shortname . "_google_plus" ); ?>
                            <?php if( !empty( $perfil_google_plus ) ) :  ?>
                                <li id="portalredes-google-plus" class="portalredes-item">
                                    <a href="<?php echo $perfil_google_plus; ?>" target="_blank" title="YouTube">
                                        <i class="fa fa-google-plus-square"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php $perfil_flickr = get_theme_mod( $shortname . "_flickr" ); ?>
                            <?php if( !empty( $perfil_flickr ) ) :  ?>
                                <li id="portalredes-flickr" class="portalredes-item">
                                    <a href="<?php echo $perfil_flickr; ?>" target="_blank" title="Flickr">
                                        <i class="fa fa-flickr"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php $perfil_instagram = get_theme_mod( $shortname . "_instagram" ); ?>
                            <?php if( !empty( $perfil_instagram ) ) :  ?>
                                <li id="portalredes-instagram" class="portalredes-item">
                                    <a href="<?php echo $perfil_instagram; ?>" target="_blank" title="Instagram">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php $perfil_soundcloud = get_theme_mod( $shortname . "_soundcloud" ); ?>
                            <?php if( !empty( $perfil_soundcloud ) ) :  ?>
                            <li id="portalredes-soundcloud" class="portalredes-item">
                                <a href="<?php echo $perfil_soundcloud; ?>" target="_blank" title="SoundCloud">
                                    <i class="fa fa-soundcloud"></i>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php $perfil_tumblr = get_theme_mod( $shortname . "_tumblr" ); ?>
                            <?php if( !empty( $perfil_tumblr ) ) :  ?>     
                                <li id="portalredes-tumblr" class="portalredes-item">
                                    <a href="<?php echo $perfil_tumblr; ?>" target="_blank" title="Tumblr">
                                       <i class="fa fa-tumblr-square"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php $feed_rss = get_theme_mod( $shortname . "_feed" ); ?>
                            <?php if( !empty( $feed_rss ) ) :  ?>  
                                <li id="portalredes-rss" class="portalredes-item last-item">
                                    <a href="<?php echo $feed_rss; ?>" target="_self" title="RSS">
                                        <i class="fa fa-rss-square"></i>
                                    </a>
                                </li>  
                            <?php endif; ?>
                        </ul>
                    </div> <!-- fim div#social-icons.row -->

                </div> <!-- fim .col-md-4 -->
            </div> <!-- fim .row -->
        </div> <!-- fim .container -->

        <div class="sobre">
            <div class="container">
                <nav class="menu-servicos pull-right">
                    <h2 class="hide">Serviços</h2>
                    <?php  wp_nav_menu( array( 'theme_location' => 'nav-servicos' ) ); ?>
                </nav>
            </div><!-- fim div.container -->
        </div> 
    </header> <!-- fim main-header -->

    <main id="main-content">