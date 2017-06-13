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

class WpGovWidgetSlides extends WP_Widget
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
       
			<div class="carousel banner-carousel slide bannergroup " id="banner-carousel-202">
				<div class="carousel-inner">
					<div class="banneritem item active">
						<a href="/component/banners/click/2" title="Portais adotam nova identidade">
							<img src="http://portalpadrao.joomlacalango.org/images/banners/banner-rotativo-home-01.jpg" alt="Site Secom, Portal do Planalto e Portal Brasil adotam nova identidade digital">
						</a>
						<div class="faixa"></div>
						<h1>
							<a href="#">Site Secom, Portal do Planalto e Portal Brasil adotam nova identidade digital</a>
						</h1>
						<p>Todos os sítios e portais do Governo Federal podem adotar o modelo</p>
						<div class="clr"></div>
					</div>

					<div class="banneritem item">
						<a href="#" title="">
							<img src="http://portalpadrao.joomlacalango.org/images/banners/banner-rotativo-home-02.jpg" alt="Saiba mais sobre o Portal Institucional Padrão do Governo Federal">
						</a>
						<div class="faixa"></div>
						<h1>
							<a href="/component/banners/click/3">
							Saiba mais sobre o Portal Institucional Padrão do Governo Federal				</a>
						</h1>
						<p>O modelo permite que o portal de cada órgão seja reconhecido como propriedade digital do Governo Federal</p>
						<div class="clr"></div>
					</div>
					<div class="banneritem item">
						<a href="/component/banners/click/4" title="Conheça os templates para informativos da Identidade Padrão">
							<img src="http://portalpadrao.joomlacalango.org/images/banners/banner-rotativo-home-03.jpg" alt="Conheça os templates para informativos da Identidade Padrão">
						</a>
						<div class="faixa"></div>
						<h1>
							<a href="#">Conheça os templates para informativos da Identidade Padrão</a>
						</h1>
						<p>Modelos podem ser utilizados para comunicação digital via mailing</p>
						<div class="clr"></div>
					</div>
				</div>

				<ol class="carousel-indicators carousel-indicators-custom">
					<li data-slide-to="0" data-target="#banner-carousel-202" class="active"><a href="#" title="e">0</a></li>
					<li data-slide-to="1" data-target="#banner-carousel-202" class=""><a href="#" title="">1</a></li>
					<li data-slide-to="2" data-target="#banner-carousel-202" class="last"><a href="#" title="">2</a></li>
				</ol>
			</div>

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
			'title' => __( 'Slides', 'governo-federal' ),
		);

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title 			= strip_tags( $instance['title'] );

		?>
			<p>
				<label for="<?php print $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?>:</label>
            	<input type="text" class="widefat" id="<?php print $this->get_field_id('title'); ?>" name="<?php print $this->get_field_name('title'); ?>" value="<?php print esc_attr( $title ); ?>"/></br>
			</p>

		<?php
	}

	// CONSTRUCTOR ///////////////////////////////////////////////////////////////////////////////////
	/**
	 * @name    __construct
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
		parent::__construct( 'widget_slides', 'Slides', array( 'classname' => 'widget-slides', 'description' => __( 'Widget Slides Carousel', 'governo-federal' ) ), array( 'width' => 400 ) );

		// includes
	}

	// DESTRUCTOR ////////////////////////////////////////////////////////////////////////////////////

}

// register widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "WpGovWidgetSlides" );' ) );

?>
