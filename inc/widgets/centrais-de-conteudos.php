<?php

/**
 * Copyright (c) 2015 Cleber Santos
 *
 * Written by Cleber Santos <oclebersantos@gmail.com>
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

class WidgetCentraisDeConteudo extends WP_Widget
{
	// ATRIBUTES /////////////////////////////////////////////////////////////////////////////////////
	var $path = '';

	// METHODS ///////////////////////////////////////////////////////////////////////////////////////
	/**
	 * load widget
	 *
	 * @name    widget
	 * @author  Cleber Santos <oclebersantos@gmail.com>
	 * @since   2015-03-05
	 * @updated 2015-03-05
	 * @param   array $args - widget structure
	 * @param   array $instance - widget data
	 * @return  void
	 */
	function widget( $args, $instance )
	{
		extract( $args );

		print $before_widget;


		if( !empty( $instance[ 'title' ] ) )
		{
			print $before_head;
			print $before_title . $instance[ 'title' ] . $after_title;
			print $after_head;
		}

		print $before_body;

		// content widget ?>
        <ul id="" class="central-conteudos list-central">
        	<?php if( !empty( $instance['videos'] ) ) :  ?>
	            <li class="item-central item-videos">
	                <a title="Central de vídeos" href="<?php echo $instance['videos']; ?>" class="link-central link-videos internal-link" target="_self">Vídeos</a></li>
            <?php endif; ?>

            <?php if( !empty( $instance['audios'] ) ) :  ?>
	            <li class="item-central item-audios">
	                <a title="" href="<?php echo $instance['audios']; ?>" class="link-central link-audios internal-link" target="_self">Áudios</a></li>
 			 <?php endif; ?>

            <?php if( !empty( $instance['imagens'] ) ) :  ?>
	            <li class="item-central item-fotos">
	                <a title="" href="<?php echo $instance['imagens']; ?>" class="link-central link-fotos internal-link" target="_self">Imagens</a></li>
			<?php endif; ?>

            <?php if( !empty( $instance['publicacoes'] ) ) :  ?>
	            <li class="item-central item-publicacoes">
	                <a title="" href="<?php echo $instance['publicacoes']; ?>" class="link-central link-publicacoes internal-link" target="_self"> Infográficos</a></li>
            <?php endif; ?>

            <?php if( !empty( $instance['infograficos'] ) ) :  ?>
	            <li class="item-central item-infograficos">
	                <a title="" href="<?php echo $instance['infograficos']; ?>" class="link-central link-infograficos internal-link" target="_self">Publicações </a></li>
            <?php endif; ?>

            <?php if( !empty( $instance['dados_abertos'] ) ) :  ?>
	            <li class="item-central item-dadosabertos">
	                <a  title="" href="<?php echo $instance['dados_abertos']; ?>"  class="link-central link-dadosabertos internal-link" target="_self">Dados Abertos</a></li>
             <?php endif; ?>

            <?php if( !empty( $instance['aplicativos'] ) ) :  ?>
	            <li class="item-central item-aplicativos last-item">
	                <a title="" href="<?php echo $instance['aplicativo']; ?>" class="link-central link-aplicativos internal-link" target="_self">Aplicativos </a></li>
       		<?php endif; ?>
        </ul>

		<?php // end content widet
		
		print $after_body;
		print $after_widget;

	}

	/**
	 * update data
	 *
	 * @name    update
	 * @author  Cleber Santos <oclebersantos@gmail.com>
	 * @since   2015-03-05
	 * @updated 2015-03-05
	 * @param   array $new_instance - new values
	 * @param   array $old_instance - old values
	 * @return  array
	 */
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		
		if( $instance != $new_instance )
		{
			$instance = $new_instance;
		}
		return $instance;
	}

	/**
	 * widget options form
	 *
	 * @name    form
	 * @author  Cleber Santos <oclebersantos@gmail.com>
	 * @since   2015-03-05
	 * @updated 2015-03-05
	 * @param   array $instance - widget data
	 * @return  void
	 */
	function form( $instance )
	{
		$defaults = array(
			'title' => __( 'Centrais de Conteúdos', 'governo-federal' ),
		);

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title 			= strip_tags( $instance['title'] );
		$videos 		= strip_tags( isset( $instance['videos'] ) ? $instance['videos'] : "" );
		$audios 		= strip_tags( isset( $instance['audios'] ) ? $instance['audios'] : "" );
		$imagens 		= strip_tags( isset( $instance['imagens'] ) ? $instance['imagens'] : "" );
		$aplicativos 	= strip_tags( isset( $instance['aplicativos'] ) ? $instance['aplicativos'] : "" );
		$publicacoes 	= strip_tags( isset( $instance['publicacoes'] ) ? $instance['publicacoes'] : "" );
		$infograficos 	= strip_tags( isset( $instance['infograficos'] ) ? $instance['infograficos'] : "" );
		$dados_abertos 	= strip_tags( isset( $instance['dados_abertos'] ) ? $instance['dados_abertos'] : "" );

		?>
			<p>
				<label for="<?php print $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?>:</label>
            	<input type="text" class="widefat" id="<?php print $this->get_field_id('title'); ?>" name="<?php print $this->get_field_name('title'); ?>" value="<?php print esc_attr( $title ); ?>"/></br>
			</p>

			<p>
				<label for="<?php print $this->get_field_id( 'videos' ); ?>"><?php _e( 'Url Vídeos' ); ?>:</label>
            	<input type="text" class="widefat" id="<?php print $this->get_field_id('videos'); ?>" name="<?php print $this->get_field_name('videos'); ?>" value="<?php print esc_attr( $videos ); ?>"/></br>
			</p>

			<p>
				<label for="<?php print $this->get_field_id( 'audios' ); ?>"><?php _e( 'Url Audios' ); ?>:</label>
            	<input type="text" class="widefat" id="<?php print $this->get_field_id('audios'); ?>" name="<?php print $this->get_field_name('audios'); ?>" value="<?php print esc_attr( $audios ); ?>"/></br>
			</p>

			<p>
				<label for="<?php print $this->get_field_id( 'imagens' ); ?>"><?php _e( 'Url Imagens' ); ?>:</label>
            	<input type="text" class="widefat" id="<?php print $this->get_field_id('imagens'); ?>" name="<?php print $this->get_field_name('imagens'); ?>" value="<?php print esc_attr( $imagens ); ?>"/></br>
			</p>

			<p>
				<label for="<?php print $this->get_field_id( 'infograficos' ); ?>"><?php _e( 'Url Infográficos' ); ?>:</label>
            	<input type="text" class="widefat" id="<?php print $this->get_field_id('infograficos'); ?>" name="<?php print $this->get_field_name('infograficos'); ?>" value="<?php print esc_attr( $infograficos ); ?>"/></br>
			</p>

			<p>
				<label for="<?php print $this->get_field_id( 'publicacoes' ); ?>"><?php _e( 'Url Publicações' ); ?>:</label>
            	<input type="text" class="widefat" id="<?php print $this->get_field_id('publicacoes'); ?>" name="<?php print $this->get_field_name('publicacoes'); ?>" value="<?php print esc_attr( $publicacoes ); ?>"/></br>
			</p>

			<p>
				<label for="<?php print $this->get_field_id( 'dados_abertos' ); ?>"><?php _e( 'Url Dados abertos' ); ?>:</label>
            	<input type="text" class="widefat" id="<?php print $this->get_field_id('dados_abertos'); ?>" name="<?php print $this->get_field_name('dados_abertos'); ?>" value="<?php print esc_attr( $dados_abertos ); ?>"/></br>
			</p>

			<p>
				<label for="<?php print $this->get_field_id( 'aplicativos' ); ?>"><?php _e( 'Url Aplicativos' ); ?>:</label>
            	<input type="text" class="widefat" id="<?php print $this->get_field_id('aplicativos'); ?>" name="<?php print $this->get_field_name('aplicativos'); ?>" value="<?php print esc_attr( $aplicativos ); ?>"/></br>
			</p>

		<?php
	}

	// CONSTRUCTOR ///////////////////////////////////////////////////////////////////////////////////
	/**
	 * @name    WidgetCentraisDeConteudo
	 * @author  Cleber Santos <oclebersantos@gmail.com>
	 * @since   2015-03-05
	 * @updated 2015-03-05
	 * @return  void
	 */
	function __construct()
	{
		// define plugin path
		$this->path = dirname( __FILE__ ) . '/';

		// register widget
		$this->WP_Widget( 'centrais_de_conteudos', 'Centrais de Conteúdo', array( 'classname' => 'widget-centrais-de-conteudo', 'description' => __( 'Widget Centrais de Conteúdos', 'governo-federal' ) ), array( 'width' => 400 ) );

		// includes
	}

	// DESTRUCTOR ////////////////////////////////////////////////////////////////////////////////////

}

// register widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "WidgetCentraisDeConteudo" );' ) );

?>
