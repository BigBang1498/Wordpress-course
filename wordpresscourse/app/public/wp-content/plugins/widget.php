<?php
    // 1. Seguridad: Evita que el archivo se ejecute directamente fuera de WordPress
if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }
  
  // 2. Método Universal: Desactiva por completo el editor de bloques en los widgets
  add_filter( 'use_widgets_block_editor', '__return_false' );
  
  // 3. Inicialización: Registrar la zona (Sidebar) y el Widget personalizado juntos
  function cmo_inicializar_componentes_widgets() {
    
    // Registrar el contenedor (Sidebar)
    register_sidebar( array(
        'name'          => 'Zona de Pruebas de mi Plugin',
        'id'            => 'sidebar-desarrollo-plugin',
        'description'   => 'Área creada por código para probar widgets PHP en temas modernos.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
  
    // Registrar el Widget nativo
    register_widget( 'CMO_Widget' );
  }
  add_action( 'widgets_init', 'cmo_inicializar_componentes_widgets' );
  
  
  // 4. Clase del Widget Personalizado
  class CMO_Widget extends WP_Widget {
    
    public function __construct() {
      $widgets_ops  = array(
        'classname'   => 'my_widget',
        'description' => 'My Widget is awesome'
      );
      parent::__construct('my_widget', 'My Awesome Widget', $widgets_ops);
    }
  
    // Renderizado en el Frontend (Página pública)
    public function widget( $args, $instance ) {
      echo $args['before_widget'];
      
      if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
      }
      
      if ( ! empty( $instance['desc'] ) ) {
        echo '<p class="widget-description">' . esc_html( $instance['desc'] ) . '</p>';
      } else {
        echo '<p class="widget-description">No description</p>';
      }
      
      echo $args['after_widget'];
    }
  
    // Formulario en el panel de Administración
    public function form ( $instance ) {
      $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
      $desc  = ! empty( $instance['desc'] ) ? $instance['desc'] : esc_html__( 'New description', 'text_domain' );
      ?>
      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'My Title: ', 'text_domain' ) ?></label>
          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ) ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
      </p>
      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_attr_e( 'My description: ', 'text_domain' ) ?></label>
          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ) ?>" type="text" value="<?php echo esc_attr( $desc ); ?>">
      </p>
      <?php
    }
  
    // Guardado de opciones
    public function update ( $new_instance, $old_instance ) {
      $instance = array();
      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
      $instance['desc']  = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
      return $instance;
    }
  }
  
  // 5. Shortcode para pintar la zona de pruebas en cualquier Post o Página
  function cmo_renderizar_sidebar_shortcode() {
      ob_start();
      
      if ( is_active_sidebar( 'sidebar-desarrollo-plugin' ) ) {
          echo '<aside id="mi-sidebar-custom" class="widget-area">';
          dynamic_sidebar( 'sidebar-desarrollo-plugin' );
          echo '</aside>';
      } else {
          echo '<!-- La zona de pruebas no tiene widgets asignados o activos -->';
      }
      
      return ob_get_clean();
  }
  add_shortcode( 'ver_mi_sidebar', 'cmo_renderizar_sidebar_shortcode' );
  
?>