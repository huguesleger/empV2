<?php
add_action('admin_init', 'emp_init_meta');
add_action('save_post', 'emp_save_meta');

function emp_init_meta() {
  add_meta_box('service-baiseline', 'Phrase d\'accroche', 'emp_render_metabox', 'services');
}

function emp_render_metabox() {
  global $post;
    $value = get_post_meta($post->ID, 'baiseline', true);
    ?>
    <div class="meta-box-item-content">
      <input type="text" name="baiseline" id="baiseline" value="<?php echo $value ?>" style="width: 100%;">
    </div>
    <input type="hidden" name="baiseline_nonce" value="<?php echo wp_create_nonce('service-baiseline'); ?>">
    <?php
}

function emp_save_meta($post_id) {
  $meta = 'baiseline';
  // on ne fait rien en cas de save ajax
  if(
      !isset($_POST[$meta]) ||
      (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) ||
      (defined('DOING_AJAX') && DOING_AJAX)
  ) {
      return false;
  }

  //on verifie le nonce
  if(wp_verify_nonce($_POST['baiseline_nonce'], 'baiseline')) {
      return false;
  }

  $value = $_POST[$meta];
  if(get_post_meta($post_id, $meta)) {
      update_post_meta($post_id, $meta, $value);
  } else if ($value === '') {
      delete_post_meta($post_id, $meta);
  } else {
      add_post_meta($post_id, $meta, $value);
  }
}
