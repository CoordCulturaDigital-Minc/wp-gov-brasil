<?php

/**
 * Copyright (c) 2015 Ministério da Cultura - Cultura Digital
 *
 * Written by
 *  Cleber Santos <oclebersantos@gmail.com>
 *	Description: Customização do tema padrão de governo para Wordpress
 *	Author URI: http://culturadigital.br/members/clebersantos
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the
 * Free Software Foundation, Inc.,
 * 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 *
 * Public License can be found at http://www.gnu.org/copyleft/gpl.html
 */

class WpGovThemeOptions {

	// ATRIBUTES /////////////////////////////////////////////////////////////////////////////////////
	var $path = '';

	// CONSTRUTOR ///////////////////////////////////////////////////////////////////////////////////
	/************************************************************************************************
		@name    __construct
		@author  Cleber Santos <oclebersantos@gmailcom>
		@since   2015-02-25
		@updated 2015-02-25
		@param 	 void
		@return  void
	************************************************************************************************/
	function __construct()
	{

		// add menu
		add_action( 'admin_menu', array(&$this, 'createMenus'));
		add_action( 'init', array( &$this, 'saveOptions') );
	}


	// METHODS ///////////////////////////////////////////////////////////////////////////////////////
	/************************************************************************************************
		Criar os Menus na área administrativa.

		@name    menus
		@author  Cleber Santos <oclebersantos@gmailcom>
		@since   2015-02-25
		@updated 2015-02-25
		@param 	 void
		@return  void
	************************************************************************************************/
	function createMenus()
	{
		global $themename, $shortname;

		// Menus secundários
		// add_submenu_page('options-general.php', __('Cultura Digital Republish', 'cdbr_republish'), 'Republicar Posts', 'user_admin_menu', 'cdbr_republish', array(&$this, 'config'));
		
		add_submenu_page('themes.php', $themename, 'Opções do Tema', 'edit_theme_options', $shortname, array( &$this, 'createForm') ) ;
	}

	/************************************************************************************************
		Cria um array com as opções do tema

		@name    getArrayThemeOptions
		@author  Cleber Santos <oclebersantos@gmailcom>
		@since   2015-02-25
		@updated 2015-02-25
		@param 	 void
		@return  void
	************************************************************************************************/
	function getArrayThemeOptions() {

		global $themename, $shortname;

		$options = array (
  			 
			array( "name" => "Geral",
			    "type" => "section"),

			array( "name" => "Esquema de cor",
			    "desc" => "Selecione um padrão de cor",
			    "id" => $shortname."_color_scheme",
			    "type" => "select",
			    "options" => array("verde", "amarelo", "azul", "branco"),
			    "std" => "azul"),
			
			array( "name" => "Customizar Favicon",
			    "desc" => "Favicon é um ícone de 16x16 pixels do seu site, cole o URL para uma imagem .ico",
			    "id" => $shortname."_favicon",
			    "type" => "text",
			    "std" => get_bloginfo('url') ."/favicon.ico"),  

			array( "name" => "Cabeçalho",
			    "type" => "section"),

			array( "name" => "Denominação do Orgão",
			    "desc" => "Denominação descreve como o órgão é caracterizado no governo. Exemplo: Palácio do, Ministério do, Secretaria dos, Agência Nacional de, etc. ",
			    "id" => $shortname."_denominacao",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Nome principal",
			    "desc" => "O nome principal do órgão. Exemplo: Planalto, Turismo, Direitos Humanos, Aviação Civil, etc",
			    "id" => "blogname",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Subordinação",
			    "desc" => "Quando necessário, a subordinação do órgão. A Secretaria de Direitos Humanos, por exemplo, está subordinada à Presidência da República.",
			    "id" => $shortname."_subordinacao",
			    "type" => "text",
			    "std" => ""),  

			array( "name" => "URL da logo",
			    "desc" => "Url da imagem, para uma boa aplicação sugerimos que as medidas sejam de até 85x85 pixels.",
			    "id" => $shortname."_logo",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Perfil Facebook",
			    "desc" => "Url da rede social, se ficar em branco o ícone não é mostrado",
			    "id" => $shortname."_facebook",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Perfil Twitter",
			    "desc" => "Url da rede social, se ficar em branco o ícone não é mostrado",
			    "id" => $shortname."_twitter",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Perfil Instagram",
			    "desc" => "Url da rede social, se ficar em branco o ícone não é mostrado",
			    "id" => $shortname."_instagram",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Perfil Google+",
			    "desc" => "Url da rede social, se ficar em branco o ícone não é mostrado",
			    "id" => $shortname."_google_plus",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Perfil Youtube",
			    "desc" => "Url da plataforma, se ficar em branco o ícone não é mostrado",
			    "id" => $shortname."_youtube",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Perfil Flickr",
			    "desc" => "Url da rede social, se ficar em branco o ícone não é mostrado",
			    "id" => $shortname."_flickr",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Perfil SoundCloud",
			    "desc" => "Url da rede social, se ficar em branco o ícone não é mostrado",
			    "id" => $shortname."_soundcloud",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Perfil Tumblr",
			    "desc" => "Url da rede social, se ficar em branco o ícone não é mostrado",
			    "id" => $shortname."_tumblr",
			    "type" => "text",
			    "std" => ""),

			array( "name" => "Feed (RSS)",
			    "desc" => "Url do feed, se ficar em branco o ícone não é mostrado",
			    "id" => $shortname."_feed",
			    "type" => "text",
			    "std" => ""),
			     
			array( "name" => "Rodapé",
			    "type" => "section"),
			     
			array( "name" => "Texto do rodapé",
			    "desc" => "Inserir texto com o endereço da instituição ou direitos autorais da página. Pode ser HTML",
			    "id" => $shortname."_footer_text",
			    "type" => "textarea",
			    "std" => ""),
			     
			array( "name" => "Código do Google Analytics",
			    "desc" => "Você pode colar o código do Google Analytics ou outro rastreamento nesta caixa. Este será automaticamente adicionado ao rodapé.",
			    "id" => $shortname."_ga_code",
			    "type" => "textarea",
			    "std" => ""),    
			
			array( "name" => "Customizar CSS",
			    "desc" => "Neste campo você pode customizar o CSS da página. ex: a.button{color:green}",
			    "id" => $shortname."_custom_css",
			    "type" => "textarea",
			    "std" => ""),   
		);

		return $options;

	}


	/************************************************************************************************
		Cria e mostra a página de formulário no painel do Wordpress

		@name    createForm
		@author  Cleber Santos <oclebersantos@gmailcom>
		@since   2015-02-25
		@updated 2015-02-25
		@param 	 void
		@return  void
	************************************************************************************************/
	function createForm() {
  
		global $themename, $shortname;
		
		$sussa = !empty( $_REQUEST['sussa'] ) ? $_REQUEST['sussa'] : "";

		if ( $sussa == 'saved' ) echo '<div id="message" class="updated fade"><p><strong>' . $themename . ' configurações salvas.</strong></p></div>';
		if ( $sussa == 'reset' ) echo '<div id="message" class="updated fade"><p><strong>' . $themename . ' configurações restauradas.</strong></p></div>';

		$options = $this->getArrayThemeOptions();

		?>
		<div class="wrap rm_wrap">

			<h2><?php echo $themename; ?> Configurações</h2>
		  	<p>Opções de personalização do tema</p>

			<form action="" method="post">
				<table class="form-table">
					<tbody>

						<?php foreach ( $options as $value ) {

							switch ( $value['type'] ) {
							  
								case 'text': ?>
									<tr valign="top">
										<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label><br /></th>
										<td>				
										    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_theme_mod( $value['id'], false ) ) { echo stripslashes( get_theme_mod( $value['id'])  ); } else { echo $value['std']; } ?>" class="regular-text"/>
										 	<br>
										 	<small><?php echo $value['desc']; ?></small>
										</td>
									</tr>
								<?php break;
					  
								case 'textarea': ?>

									<tr valign="top">
										<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label><br /></th>
										<td>				
										    <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="40" rows="5"><?php if ( get_theme_mod( $value['id'], false ) ) { echo stripslashes( get_theme_mod( $value['id']) ); } else { echo $value['std']; } ?></textarea>
											<br>
											<small><?php echo $value['desc']; ?></small>
										</td>
									</tr>
					   
								<?php break;
					  
								case 'select': ?>
									<tr valign="top">
										<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label><br /></th>
										<td>				
										    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
											<?php foreach ($value['options'] as $option) { ?>
											        <option <?php if ( get_theme_mod( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
											</select>
											<br>
											<small><?php echo $value['desc']; ?></small>
										</td>
									</tr>

								<?php break;
					  
								case "checkbox": ?>

									<tr valign="top">
										<th scope="row"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label><br /></th>
										<td>
						     
											<?php if( get_theme_mod($value['id'], false ) ){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
											<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
							 
							    			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
						 				</td>
									</tr>
								<?php break;	
								
								case "section": ?>
	 
										<tr valign="top">
											<th scope="row"><h3><?php echo $value['name']; ?></h3></th>
											<td>
							     
							 				</td>
										</tr>
								<?php break;
		  					} // end while
						} // end foreach ?>
					</tbody>
				</table>


				<p class="submit">
					<?php // wp_nonce_field('wp_gov_save_action'); ?>
					<input type="hidden" name="action" value="save" />
					<input type="hidden" name="sussa" value="save" />
					<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save'); ?>">
					
				</p>
			</form>

			<form method="post">
				<p class="submit">
					<input type="hidden" name="sussa" value="reset" />
					<input type="hidden" name="action" value="reset" />
					<input type="submit" name="reset" class="button action" value="Restaurar">
				</p>
			</form>
			
		</div>  <?php
	}	

	function saveOptions() {

		global $themename, $shortname;

		$action = !empty( $_REQUEST['action'] ) ? $_REQUEST['action'] : "";

		$options = $this->getArrayThemeOptions();

  		// colocar nonce aqui
  		// wp_verify_nonce('wp_gov_save_action');
	  
	    if ( 'save' == $action )
	    {	
	    	foreach ( $options as $value ) {

			    if( isset( $value['id'] ) ){

			     	if( isset( $_REQUEST[ $value['id'] ] ) )    
			    		set_theme_mod( $value['id'], $_REQUEST[ $value['id'] ]  ); 
			    	else
			    		remove_theme_mod( $value['id'] ); 
			  	}
			}
			    	header("Location: themes.php?page=wp_gov_brasil&sussa=saved");
			die;
			  
		} else if( 'reset' == $action ) {
	  
		    foreach ($options as $value) {
		        remove_theme_mod( $value['id'] ); }
	  
	    	header("Location: themes.php?page=wp_gov_brasil&sussa=reset");
		
			die;
		}	
	}

	// DESTRUCTOR ////////////////////////////////////////////////////////////////////////////////////

}

$WpGovThemeOptions = new WpGovThemeOptions();

?>
