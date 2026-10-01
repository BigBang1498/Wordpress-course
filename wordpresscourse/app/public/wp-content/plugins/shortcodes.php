<?php
//El nombre de tu función. Lleva el prefijo cmo_ (tus iniciales) para evitar colisiones de nombres 
//(que otro plugin use una función llamada igual y rompa PHP).
        function cmo_generar_boton( $atts ) {
//$atributos =: Declaras una variable donde vas a guardar el resultado final de la combinación.
/*shortcode_atts( ... ): Llamas a la función de WordPress que limpia y mezcla los datos. Recibe dos parámetros:
    El primer parámetro es un array(...) con los valores de respaldo de tu fábrica: si no ponen color, será 'azul'; si no ponen texto, dirá 'Hacer click aquí'. 
    El segundo parámetro es $atts, que contiene lo que el usuario de verdad escribió.
*/
        $atributos = shortcode_atts( array(
            'color' => 'azul',
            'texto' => 'Hacer click aqui'
        ), $atts);
/*return: Es la orden de PHP para escupir el resultado hacia atrás y terminar la función. Recuerda: los shortcodes procesan cadenas en memoria, no las imprimen directamente en pantalla.

'...' . $atributos['color'] . '...': Los puntos . son operadores de concatenación en PHP. Los usas para pegar fragmentos de texto HTML estático con los valores dinámicos que vienen dentro de tu arreglo $atributos.

}: Cierra el bloque de código de tu función.
*/
        return '<a href="#" class="btn btn-' . $atributos['color'] . '">' . $atributos['texto'] .  '</a>';
    }
/*add_shortcode: Registras oficialmente la etiqueta ante WordPress.

'boton_contacto': El primer parámetro es el nombre exacto que el usuario escribirá entre corchetes en su editor: [boton_contacto].

'CMO_generar_boton': El segundo parámetro es un string con el nombre exacto de la función que declaraste arriba. Así WordPress sabe a quién mandar llamar cuando lea el corchete.
*/
    add_shortcode( 'boton_contacto', 'cmo_generar_boton' );
?>