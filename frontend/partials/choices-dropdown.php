<select name='<?php _e( $this->get_input_name( $question->ID ) );?>'>
	<?php foreach( $question->choices as $choice ):?>
	<option value='<?php _e( $choice->ID );?>'><?php _e( $choice->title );?></option>
	<?php endforeach;?>
</select>