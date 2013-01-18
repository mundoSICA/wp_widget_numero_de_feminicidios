<?php
/*
Plugin Name: Número de feminicilios
Plugin URI: http://mundosica.com/blog/category/wp-plugins/
Description: Este plugin que nos ayuda a llevar el conteo del número de feminicilios. Plugin desarrollada por <a href="http://mundosica.com">mundoSICÁ.com</a>
Version: 1.0.1
Author: fitorec
Contributors: eymard
Author URI: http://www.mundosica.com/blog/author/fitorec/
*/

/**
 * Authors Widget Class
 */
class numero_de_feminicilios_widget extends WP_Widget {

    /** constructor */
    function numero_de_feminicilios_widget() {
        parent::WP_Widget(false, $name = 'Número de feminicilios');
    }

		/**
		 * Muestra la salida del widget en la página
		 *
		 * @param tipo $parametro1 descripción del párametro 1.
		 * @return tipo descripcion de lo que regresa
		 * @access publico
		 * @link WP_Widget::widget
		 */
    function widget($args, $instance) {
			?>
			<div id="numero_de_feminicilios">
				<h2><?php echo $instance['titulo']; ?>
					<strong><?php echo $instance['numero_de_feminicilios']; ?></strong>
				</h2>
			</div>
			<?php
    }//end function widget

		/**
		 * WP_Widget::update -> Se encarga de actualizar el número
		 *
		 * @param array $new_instance la nueva instancia donde numero_de_feminicilios tiene que ser un número
		 * @param array $old_instance la anterior instancia(los datos anteriores)
		 * @return array regresa la instancia cambiada(en caso que no suceda ningun errror)
		 * @access public
		 * @link WP_Widget::update
		 */
    function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['titulo'] = strip_tags($new_instance['titulo']);
			$instance['numero_de_feminicilios'] = strip_tags($new_instance['numero_de_feminicilios']);
			return $instance;
    }//end function

		/**
		 * Descripción de la función
		 *
		 * @param tipo $parametro1 descripción del párametro 1.
		 * @return tipo descripcion de lo que regresa
		 * @access publico/privado
		 * @link WP_Widget::form
		 */
    function form($instance) {
			$instance = wp_parse_args (
					(array) $instance,
					array(
						'titulo' => 'Mujeres asesinadas en Oaxaca durante el presente Gobierno:',
						'numero_de_feminicilios' => 100
					)
				);
			$numero_de_feminicilios = esc_attr($instance['numero_de_feminicilios']);
			$titulo = esc_attr($instance['titulo']);
        ?>
       <p>
					<label for="<?php echo $this->get_field_id('titulo'); ?>">Titulo:</label>
					<br>
          <input id="<?php echo $this->get_field_id('titulo'); ?>" name="<?php echo $this->get_field_name('titulo'); ?>" type="text" value="<?php echo $titulo; ?>"/>
       </p>
			<p>
					<label for="<?php echo $this->get_field_id('numero_de_feminicilios'); ?>">Número de feminicilios:</label>
					<br>
          <input id="<?php echo $this->get_field_id('numero_de_feminicilios'); ?>" name="<?php echo $this->get_field_name('numero_de_feminicilios'); ?>" type="text" value="<?php echo $numero_de_feminicilios; ?>"/>
      </p>
        <?php
    }//end form function
} // class utopian_recent_posts
// register Recent Posts widget
add_action('widgets_init', create_function('', 'return register_widget("numero_de_feminicilios_widget");'));