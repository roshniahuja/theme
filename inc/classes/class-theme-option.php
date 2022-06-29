<?php
/**
 * Theme Theme Options.
 *
 * @package rosh-standard
 */

namespace rosh_standard\Inc;

use rosh_standard\Inc\Traits\Singleton;

/**
 * Class Theme Options.
 */
class Theme_Option {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	protected function setup_hooks() {

		/**
		 * Actions
		 */
		add_action( 'admin_menu', [ $this, 'add_option_menu' ] );
		add_action( 'admin_init', [ $this, 'option_settings_init' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'theme_option_js' ] );

	}

	/**
	 * Added option Menu.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function add_option_menu() {
		add_menu_page( 'Theme Options', 'Theme Options', 'manage_options', 'rosh-standard', [ $this, 'option_form' ], '', 50 );
	}

	/**
	 * Generate Option form.
	 * Added enctype="multipart/form-data" to allow media upload.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function option_form() {
		?>
		<span><?php settings_errors(); ?></span>
		<form action='options.php' enctype="multipart/form-data" method='post'> 
			<?php
			settings_fields( 'rosh-standard-setting' );
			do_settings_sections( 'rosh-standard' );
			submit_button();
			?>
		</form> 
		<?php
	}

	/**
	 * Add Setting fields.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function option_settings_init() {
		register_setting( 'rosh-standard-setting', 'rosh_standard_settings' );
		add_settings_section( 'rosh-standard-section', __( 'Theme Options', 'rosh-standard' ), [ $this, 'theme_option_description' ], 'rosh-standard' );
		add_settings_field(
			'rosh_standard_logo',
			__( 'Site Logo:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'file',
				'name'  => 'rosh_standard_settings[rosh_standard_img]',
				'value' => 'rosh_standard_img',
			]
		);
		add_settings_field(
			'rosh_standard_favicon',
			__( 'Site Favicon:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'file',
				'name'  => 'rosh_standard_settings[rosh_standard_favicon]',
				'value' => 'rosh_standard_favicon',
			]
		);
		add_settings_field(
			'rosh_standard_tagline',
			__( 'Site Tagline:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'text',
				'name'  => 'rosh_standard_settings[rosh_standard_tagline]',
				'value' => 'rosh_standard_tagline',
			]
		);
		add_settings_field(
			'rosh_standard_google_analytic',
			__( 'Google Analytic:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'textarea',
				'name'  => 'rosh_standard_settings[rosh_standard_google_analytic]',
				'value' => 'rosh_standard_google_analytic',
			]
		);
		add_settings_field(
			'rosh_standard_css_code',
			__( 'Additional CSS:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'textarea',
				'name'  => 'rosh_standard_settings[rosh_standard_css_code]',
				'value' => 'rosh_standard_css_code',
			]
		);
		add_settings_field(
			'rosh_standard_html_code',
			__( 'Additional html:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'textarea',
				'name'  => 'rosh_standard_settings[rosh_standard_html_code]',
				'value' => 'rosh_standard_html_code',
			]
		);
		add_settings_field(
			'rosh_standard_color_picker',
			__( 'Color:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'color-picker',
				'name'  => 'rosh_standard_settings[rosh_standard_color_picker]',
				'value' => 'rosh_standard_color_picker',
			]
		);
		add_settings_field(
			'rosh_standard_wysiwyg',
			__( 'Text Editor:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'wysiwyg',
				'name'  => 'rosh_standard_settings[rosh_standard_wysiwyg]',
				'value' => 'rosh_standard_wysiwyg',
			]
		);
		add_settings_field(
			'rosh_standard_password',
			__( 'Manage Password:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'password',
				'name'  => 'rosh_standard_settings[rosh_standard_password]',
				'id'    => 'password',
				'value' => 'rosh_standard_password',
			]
		);
		add_settings_field(
			'rosh_standard_selectbox',
			__( 'Select Option:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'    => 'select',
				'name'    => 'rosh_standard_settings[rosh_standard_selectbox]',
				'value'   => 'rosh_standard_selectbox',
				'options' => [
					'0' => '0',
					'1' => '1',
					'2' => '2',
					'3' => '3',
				],
			]
		);
		add_settings_field(
			'rosh_standard_multiselect',
			__( 'Select Multiple Option:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'    => 'multicheck',
				'name'    => 'rosh_standard_settings[rosh_standard_multiselect]',
				'id'      => 'multicheck',
				'value'   => 'rosh_standard_multiselect',
				'options' => [
					'0' => 'pizza',
					'1' => 'biryani',
					'2' => 'burger',
					'3' => 'pav bhaji',
				],
			]
		);
		add_settings_field(
			'rosh_standard_radio',
			__( 'Select Radio Option:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'    => 'radio',
				'name'    => 'rosh_standard_settings[rosh_standard_radio]',
				'value'   => 'rosh_standard_radio',
				'options' => [
					'0' => 'HTML',
					'1' => 'CSS',
					'2' => 'JS',
					'3' => 'PHP',
				],
			]
		);
		add_settings_field(
			'rosh_standard_checkbox',
			__( 'Select Checkbox Option:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'checkbox',
				'id'    => 'checkbox',
				'name'  => 'rosh_standard_settings[rosh_standard_checkbox]',
				'value' => 'rosh_standard_checkbox',
				'task'  => 'Enable Transparent Header ?',
			]
		);
		add_settings_field(
			'rosh_standard_number',
			__( 'Number:', 'rosh-standard' ),
			[ $this, 'add_field' ],
			'rosh-standard',
			'rosh-standard-section',
			[
				'type'  => 'number',
				'name'  => 'rosh_standard_settings[rosh_standard_number]',
				'value' => 'rosh_standard_number',
			]
		);

	}

	/**
	 * Callback to display description.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function theme_option_description() {
		echo esc_html__( 'Update Settings.', 'rosh-standard' );
	}

	/**
	 * Generate Fields.
	 *
	 * @param  array $args Field argument.
	 * @return void
	 * @since 1.0.0
	 */
	public function add_field( array $args ) {
		$options = get_option( 'rosh_standard_settings' );
		switch ( $args['type'] ) {
			case 'text':
				$this->text_callback( $args, $options );
				break;
			case 'textarea':
				$this->textarea_callback( $args, $options );
				break;
			case 'file':
				$this->file_callback( $args, $options );
				break;
			case 'checkbox':
				$this->checkbox_callback( $args, $options );
				break;
			case 'multicheck':
				$this->multiselect_callback( $args, $options );
				break;
			case 'color-picker':
				$this->color_picker_callback( $args, $options );
				break;
			case 'wysiwyg':
				$this->wysiwyg_callback( $args, $options );
				break;
			case 'password':
				$this->password_callback( $args, $options );
				break;
			case 'select':
				$this->selectbox_callback( $args, $options );
				break;
			case 'radio':
				$this->radio_button_callback( $args, $options );
				break;
			case 'number':
				$this->number_callback( $args, $options );
				break;
		}
	}

	/**
	 * Generate textbox.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function text_callback( $args, $options ) {
		?>
		<input type="<?php echo esc_attr( $args['type'] ); ?>" name="<?php echo esc_attr( $args['name'] ); ?>" value="<?php echo isset( $options[ $args['value'] ] ) ? esc_attr( $options[ $args['value'] ] ) : ''; ?>" />
		<?php
	}

	/**
	 * Generate textarea.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function textarea_callback( $args, $options ) {
		?>
		<textarea type="<?php echo esc_attr( $args['type'] ); ?>" name="<?php echo esc_attr( $args['name'] ); ?>" rows="8" cols="40"><?php echo isset( $options[ $args['value'] ] ) ? esc_html( $options[ $args['value'] ] ) : ''; ?></textarea>
		<?php
	}

	/**
	 * Generate image.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function file_callback( $args, $options ) {
		?>
		<img class="rosh_standard_img" 
			name="<?php echo esc_attr( $args['name'] ); ?>" 
			src="<?php echo isset( $options[ $args['value'] ] ) ? esc_attr( $options[ $args['value'] ] ) : ''; ?>" 
			<?php
			if ( ! empty( $options[ $args['value'] ] ) ) {
				echo 'width="250px" height="150px"';
			}
			?>
		/>
		<input class="rosh_standard_img_url" 
			type="hidden" 
			name="<?php echo esc_attr( $args['name'] ); ?>" 
			size="60" 
			value="<?php echo isset( $options[ $args['value'] ] ) ? esc_attr( $options[ $args['value'] ] ) : ''; ?>"
		>
		<a href="#" class="rosh_standard_img_upload"><button>Upload</button></a>
		<a href="#" class="rosh_standard_img_remove"><button>Remove</button></a>
		<?php
	}

	/**
	 * Generate Checkbox.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function checkbox_callback( $args, $options ) {
		?>
		<input id="<?php echo esc_attr( $args['id'] ); ?>" type="<?php echo esc_attr( $args['type'] ); ?>" name="<?php echo esc_attr( $args['name'] ); ?>" value="true" <?php checked( 'true', $options[ $args['value'] ] ); ?>>
		<label for="<?php echo esc_attr( $args['id'] ); ?>"><?php echo esc_html( $args['task'] ); ?></label>
		<?php
	}

	/**
	 * Generate Multi Select.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function multiselect_callback( $args, $options ) {
		$multi_select_options = $args['options'];
		?>
				<select multiple id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( $args['name'] ); ?>[]" value="<?php echo isset( $options[ $args['value'] ] ) ? esc_attr( $options[ $args['value'] ] ) : ''; ?>">
			<?php
			foreach ( $multi_select_options as $key => $value ) :
				?>
				<option value="<?php echo esc_attr( $key ); ?>" 
						<?php
						if ( isset( $options[ $args['value'] ] ) ) {
							echo in_array( "$key", $options[ $args['value'] ], true ) ? 'selected' : ''; }
						?>
				>
					<?php echo esc_html( $value ); ?>
				</option>
				<?php
				endforeach;
			?>
		</select>
		<br />
		<span id="help-notice">hold command on MAC and control on Windows to select multiple options</span>
		<?php
	}

	/**
	 * Generate Color Picker.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function color_picker_callback( $args, $options ) {
		?>
		<input type="text" class="color-picker" name="<?php echo esc_attr( $args['name'] ); ?>" value="<?php echo isset( $options[ $args['value'] ] ) ? esc_attr( $options[ $args['value'] ] ) : ''; ?>" />
		<?php
	}

	/**
	 * Generate wysiwyg.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function wysiwyg_callback( $args, $options ) {
		$content = isset( $options[ $args['value'] ] ) ? $options[ $args['value'] ] : '';
		wp_editor( $content, 'wysiwyg', [ 'textarea_name' => esc_attr( $args['name'] ) ] );
	}


	/**
	 * Generate Password.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function password_callback( $args, $options ) {
		?>
		<input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="<?php echo esc_attr( $args['id'] ); ?>" type="<?php echo esc_attr( $args['type'] ); ?>" name="<?php echo esc_attr( $args['name'] ); ?>" value="<?php echo isset( $options[ $args['value'] ] ) ? esc_attr( $options[ $args['value'] ] ) : ''; ?>" />
		<div id="message">
			<h3>Password must contain the following:</h3>
			<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
			<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
			<p id="number" class="invalid">A <b>number</b></p>
			<p id="length" class="invalid">Minimum <b>8 characters</b></p>
		</div>
		<?php
	}

	/**
	 * Generate Select Box.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function selectbox_callback( $args, $options ) {
		$select_options = $args['options'];
		?>
		<select name="<?php echo esc_attr( $args['name'] ); ?>" value="<?php echo isset( $options[ $args['value'] ] ) ? esc_attr( $options[ $args['value'] ] ) : ''; ?>">
			<?php
			foreach ( $select_options as $key => $value ) :
				?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $options[ $args['value'] ], $key ); ?>><?php echo esc_html( $value ); ?></option>
				<?php
				endforeach;
			?>
		</select>
		<?php
	}

	/**
	 * Generate Radio Button.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function radio_button_callback( $args, $options ) {
		$radio_options = $args['options'];
		foreach ( $radio_options as $key => $value ) :
			?>
			<input id="val<?php echo esc_attr( $key ); ?>" type="<?php echo esc_attr( $args['type'] ); ?>" name="<?php echo esc_attr( $args['name'] ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php checked( $options[ $args['value'] ], $key ); ?>>
			<label for="val<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></label><br>
			<?php
		endforeach;
	}

	/**
	 * Generate Number Textbox.
	 *
	 * @param  array $args Field argument.
	 * @param  array $options option values.
	 * @return void
	 * @since 1.0.0
	 */
	public function number_callback( $args, $options ) {
		?>
		<input type="<?php echo esc_attr( $args['type'] ); ?>" name="<?php echo esc_attr( $args['name'] ); ?>" value="<?php echo isset( $options[ $args['value'] ] ) ? esc_attr( $options[ $args['value'] ] ) : ''; ?>">
		<?php
	}

	/**
	 * Enqueue option js file.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function theme_option_js() {

		wp_enqueue_style( 'wp-color-picker' );

		if ( ! did_action( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}

		wp_register_script( 'theme-option-js', rosh_standard_BUILD_JS_URI . '/themeoption.js', [ 'jquery', 'wp-color-picker' ], filemtime( rosh_standard_BUILD_JS_DIR_PATH . '/themeoption.js' ), true );
		wp_enqueue_script( 'theme-option-js' );
	}

}
