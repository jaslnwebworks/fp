 <?php
 function rheumnow_updates_form_alter(&$form, FormStateInterface $form_state, $form_id) {

  if (substr($form_id, 0,14)  == 'poll_view_form') {
    $options = [];
    foreach ($form['choice']['#options'] as $key => $value) {
      $options[$key] = '<span class="class-icon hide"></span>'.$value;
    }
    $form['choice']['#options'] = $options;
  }
}

//second thing maintain the hierarchy there taxonomy terms ///

/**
 * hook_form_alter
 */

function stream_import_form_alter(&$form, FormStateInterface $form_state, $form_id) {

   if($form_id == 'views_exposed_form' && $form['#id'] == 'views-exposed-form-streams-page-1') {
    	$form['select_genre'] = array(
            '#type'=>'select',
            '#title'=>'Select Genre',
            '#weight'=>'3',
            '#options'=>array(
				'1'=>t('Video'),
				'2'=>t('Music'),
				'3'=>t('CCTV'),
				),
        );
        $form['field_genre_target_id']['#weight'] = '4';
        $form['field_genre_target_id_1']['#weight'] = '5';
        $form['field_genre_target_id_2']['#weight'] = '6';
        $form['field_genre_target_id']['#states'] = array(
	      'visible' => array(
	          ':input[name="select_genre"]' => array('value' => '1')
	      ),
	      'disabled' => array(
	           [':input[name="select_genre"]' => array('value' => '2')],
	          'or',
	          [':input[name="select_genre"]' => array('value' => '3')]
	      ),
	    );
        $form['field_genre_target_id_1']['#states'] = array(
	      'visible' => array(
	          ':input[name="select_genre"]' => array('value' => '2')
	      ),
	      'disabled' => array(
	           [':input[name="select_genre"]' => array('value' => '1')],
	          'or',
	          [':input[name="select_genre"]' => array('value' => '3')]
	      ),
	    );
        $form['field_genre_target_id_2']['#states'] = array(
	      'visible' => array(
	          ':input[name="select_genre"]' => array('value' => '3')
	      ),
	      'disabled' => array(
	           [':input[name="select_genre"]' => array('value' => '1')],
	          'or',
	          [':input[name="select_genre"]' => array('value' => '2')]
	      ),
	    );
  	}
} 
