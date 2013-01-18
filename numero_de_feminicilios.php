<?php
/*
Plugin Name: Número de feminicilios
Plugin URI: https://github.com/mundoSICA/wp_widget_numero_de_feminicilios
Description: Este plugin que nos ayuda a llevar el conteo del número de feminicilios. Plugin desarrollada por <a href="http://mundosica.com">mundoSICÁ.com</a>
Version: 1.0.1
Author: fitorec
Contributors: eymard
Author URI: http://www.mundosica.com/blog/author/fitorec/
*/

/**
 * Número de feminicilios Widget Class
 */
class Numero_de_feminicilios_widget extends WP_Widget {

/**
 * Constructor - Se encarga de crear la instancia
 *
 * @return void
 * @access public
 * @link http://codex.wordpress.org/Widgets_API
 */
	public function __construct() {
		parent::__construct(
	 		'Numero_de_feminicilios_widget', // Base ID
			'Número de feminicilios', // Nombre
			array( 'description' => 'Este plugin que nos ayuda a llevar el conteo del número de feminicilios. Plugin desarrollada por http://mundosica.com', ) // Args
		);
	}//end __construct function

/**
 * Muestra la salida del widget en la página
 *
 * @param array $args los argumentos
 * @param array $instance los valores que obtenemos del panel administrativo
 * @return void
 * @access public
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
 * Se encarga de generar el formulario para la parte administrativa.
 *
 * @param array $instance valores de la instancia
 * @return void
 * @access public
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

/**
 * Se encarga de actualizar los datos que recibimos del formulario de la parte administrativa.
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
	}//end function update

} // end class Numero_de_feminicilios_widget

// registro de Número de feminicilios Widget
add_action(
	'widgets_init',
	create_function('', 'return register_widget("Numero_de_feminicilios_widget");')
);
