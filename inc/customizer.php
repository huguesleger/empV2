<?php
/**
 * Emp Theme Customizer.
 *
 * @package Emp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function emp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_section( 'header_image' )->panel         = 'emp_header_panel';
  $wp_customize->get_section( 'header_image' )->priority      = '12';

    //Titles
  class Emp_Info extends WP_Customize_Control {
    public $type = 'info';
    public $label = '';
    public function render_content() {
    ?>
        <h3 style="margin-top:15px;background-color:#008ec2;padding:5px;color:#ffffff;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
    <?php
    }
  }

  //Get defaults
	$defaults = emp_customizer_defaults();


  /**
	 * Header
	 */
    $wp_customize->add_panel( 'emp_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header', 'emp'),
    ) );
    $wp_customize->add_section(
        'emp_header_type',
        array(
            'title'         => __('Header type', 'emp'),
            'priority'      => 10,
            'panel'         => 'emp_header_panel',
        )
    );

    //Front page
    $wp_customize->add_setting(
        'front_header_type',
        array(
            'default'           => $defaults['front_header_type'],
            'sanitize_callback' => 'emp_sanitize_header',
        )
    );
    $wp_customize->add_control(
        'front_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Homepage header type', 'emp'),
            'section'     => 'emp_header_type',
            'description' => __('Cette option s\'applique à la homepage', 'emp'),
            'choices' => array(
                'has-slider'    => __('Slider', 'emp'),
                'has-image'     => __('Image', 'emp')
            ),
        )
    );

    //___Slider___//
    $wp_customize->add_section(
        'emp_slider',
        array(
            'title'         => __('Header Slider', 'emp'),
            'panel'         => 'emp_header_panel',
        )
    );

		$wp_customize->add_control( new Emp_Info( $wp_customize, 'option', array(
				'label' => __('Options ', 'emp'),
				'section' => 'emp_slider',
				'settings' => array(),
				'priority' => 6
				) )
		);
    //Speed
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default' => $defaults['slider_speed'],
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'slider_speed',
        array(
            'label' => __( 'Slider vitesse', 'emp' ),
            'section' => 'emp_slider',
            'type' => 'number',
            'description'   => __('Vitesse du slider en milisecondes [default: 6000]', 'emp'),
            'priority' => 7
        )
    );

		//Arrows
		$wp_customize->add_setting(
				'slider_arrows',
				array(
						'default' =>'',
						'sanitize_callback' => 'emp_sanitize_text',
				)
			);

			$wp_customize->add_control(
					'slider_arrows',
					array(
							'label' => __('Slider direction', 'emp'),
							'section' => 'emp_slider',
							'type' => 'select',
							'description' => __('Affichage des fleches de direction [default: oui]', 'emp'),
							'priority' => 8,
							'choices'	=> array(
									'true' => esc_html__('oui','emp'),
									'false' 	 => esc_html__('non','emp'),
							)
					)
				);

				//Dots
				$wp_customize->add_setting(
						'slider_dots',
						array(
								'default' =>'',
								'sanitize_callback' => 'emp_sanitize_text',
						)
					);

					$wp_customize->add_control(
							'slider_dots',
							array(
									'label' => __('Slider points', 'emp'),
									'section' => 'emp_slider',
									'type' => 'select',
									'description' => __('Affichage du nombre de slide [default: oui]', 'emp'),
									'priority' => 9,
									'choices'	=> array(
											'true' => esc_html__('oui','emp'),
											'false' 	 => esc_html__('non','emp'),
									)
							)
						);


    for ($c = 1; $c <= 3; $c++) {
  	    $wp_customize->add_control( new Emp_Info( $wp_customize, 'slide' . $c, array(
  	        'label' => __('Slide ', 'emp') . $c,
  	        'section' => 'emp_slider',
  	        'settings' => array(),
  	        'priority' => 10
  	        ) )
  	    );

  	    $wp_customize->add_setting(
  	        'slide_image_' . $c,
  	        array(
  	            'default' => $defaults['slide_image_' . $c],
  	            'sanitize_callback' => 'esc_url_raw',
  	        )
  	    );
  	    $wp_customize->add_control(
  	        new WP_Customize_Image_Control(
  	            $wp_customize,
  	        	'slide_image_' . $c,
  	            array(
  	               'label'     => __( 'Ajouter une image', 'emp' ),
  	               'type'      => 'image',
  	               'section'   => 'emp_slider',
  	               'priority'  => 10,
  	            )
  	        )
  	    );
  	    $wp_customize->add_setting(
  	        'slide_title_' . $c,
  	        array(
  	            'sanitize_callback' => 'emp_sanitize_text',
  	        )
  	    );
  	    $wp_customize->add_control(
  	        'slide_title_' . $c,
  	        array(
  	            'label' 	=> __( 'Titre', 'emp' ),
  	            'section' 	=> 'emp_slider',
  	            'type' 		=> 'text',
  	            'priority' 	=> 10
  	        )
  	    );
  	    $wp_customize->add_setting(
  	        'slide_subtitle_' . $c,
  	        array(
  	            'sanitize_callback' => 'emp_sanitize_text',
  	        )
  	    );
  	    $wp_customize->add_control(
  	        'slide_subtitle_' . $c,
  	        array(
  	            'label' 	=> __( 'Texte', 'emp' ),
  	            'section' 	=> 'emp_slider',
  	            'type' 		=> 'textarea',
  	            'priority' 	=> 10
  	        )
  	    );
  	    $wp_customize->add_setting(
  	        'slide_btn_url_' . $c,
  	        array(
  	            'sanitize_callback' => 'esc_url_raw',
  	        )
  	    );
  	    $wp_customize->add_control(
  	        'slide_btn_url_' . $c,
  	        array(
  	            'label' 	=> __( 'Lien du bouton', 'emp' ),
  	            'section' 	=> 'emp_slider',
  	            'type' 		=> 'text',
  	            'priority' 	=> 10
  	        )
  	    );
  	    $wp_customize->add_setting(
  	        'slide_btn_title_' . $c,
  	        array(
  	            'sanitize_callback' => 'emp_sanitize_text',
  	        )
  	    );
  	    $wp_customize->add_control(
  	        'slide_btn_title_' . $c,
  	        array(
  	            'label' 	=> __( 'Texte du bouton', 'emp' ),
  	            'section' 	=> 'emp_slider',
  	            'type' 		=> 'text',
  	            'priority' 	=> 10
  	        )
  	    );
  	}

    //___Image___//
    $wp_customize->add_section(
        'emp_image',
        array(
            'title'         => __('Header Image', 'emp'),
            'priority'      => 12,
            'panel'         => 'emp_header_panel',
        )
    );
		$wp_customize->add_control( new Emp_Info( $wp_customize, 'options', array(
				'label' => __('Options ', 'emp'),
				'section' => 'emp_image',
				'settings' => array(),
				'priority' => 6
				) )
		);
		//Speed
		$wp_customize->add_setting(
				'slide_texte_speed',
				array(
						'default' => $defaults['slide_texte_speed'],
						'sanitize_callback' => 'absint',
				)
		);
		$wp_customize->add_control(
				'slide_texte_speed',
				array(
						'label' => __( 'Slider vitesse', 'emp' ),
						'section' => 'emp_image',
						'type' => 'number',
						'description'   => __('Vitesse du slider en milisecondes [default: 6000]', 'emp'),
						'priority' => 7
				)
		);

		$wp_customize->add_control( new Emp_Info( $wp_customize, 'image', array(
				'label' => __('Image du header ', 'emp'),
				'section' => 'emp_image',
				'settings' => array(),
				'priority' => 8
				) )
		);

    $wp_customize->add_setting(
        'img_image',
        array(
            'default' => $defaults['img_image'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
          'img_image',
            array(
               'label'     => __( 'Ajouter une image', 'emp' ),
               'type'      => 'image',
               'section'   => 'emp_image',
               'priority'  => 10,
            )
        )
    );
		for ($c = 1; $c <= 3; $c++) {
		$wp_customize->add_control( new Emp_Info( $wp_customize, 'texte' . $c, array(
				'label' => __('Texte ', 'emp') . $c,
				'section' => 'emp_image',
				'settings' => array(),
				'priority' => 10
				) )
		);

		$wp_customize->add_setting(
				'slide_texte_title_' . $c,
				array(
						'sanitize_callback' => 'emp_sanitize_text',
				)
		);

		$wp_customize->add_control(
				'slide_texte_title_' . $c,
				array(
						'label' 	=> __( 'Titre', 'emp' ),
						'section' 	=> 'emp_image',
						'type' 		=> 'text',
						'priority' 	=> 10
				)
		);


	$wp_customize->add_setting(
			'slide_texte_txt_' . $c,
			array(
					'sanitize_callback' => 'emp_sanitize_text',
			)
	);

	$wp_customize->add_control(
			'slide_texte_txt_' . $c,
			array(
					'label' 	=> __( 'Texte', 'emp' ),
					'section' 	=> 'emp_image',
					'type' 		=> 'textarea',
					'priority' 	=> 10
			)
	);

	$wp_customize->add_setting(
			'slide_texte_btn_url_' . $c,
			array(
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			'slide_texte_btn_url_' . $c,
			array(
					'label' 	=> __( 'Lien du bouton', 'emp' ),
					'section' 	=> 'emp_image',
					'type' 		=> 'text',
					'priority' 	=> 10
			)
	);
	$wp_customize->add_setting(
			'slide_texte_btn_title_' . $c,
			array(
					'sanitize_callback' => 'emp_sanitize_text',
			)
	);
	$wp_customize->add_control(
			'slide_texte_btn_title_' . $c,
			array(
					'label' 	=> __( 'Texte du bouton', 'emp' ),
					'section' 	=> 'emp_image',
					'type' 		=> 'text',
					'priority' 	=> 10
			)
	);
}


/**
 * Sections
 */
 $wp_customize->add_panel( 'emp_section_panel', array(
		 'priority'       => 11,
		 'capability'     => 'edit_theme_options',
		 'theme_supports' => '',
		 'title'          => __('Sections', 'emp'),
 ) );

//presentation //
 $wp_customize->add_section(
		 'section_presentation',
		 array(
				 'title'         => __('Section Presentation', 'emp'),
				 'priority'      => 10,
				 'panel'         => 'emp_section_panel',
		 )
 );

 // Show section
 $wp_customize->add_setting( 'presentation_disable',
		array(
				'sanitize_callback' => 'emp_sanitize_checkbox',
				'default'           => '',
		)
 );
 $wp_customize->add_control( 'presentation_disable',
		array(
				'type'        => 'checkbox',
				'label'       => esc_html__('cacher cette section ?', 'emp'),
				'section'     => 'section_presentation',
		)
 );

 //presentation substile
 $wp_customize->add_setting(
		'presentation_subtitle',
		array(
				'default'           => '',
				'sanitize_callback' => 'emp_sanitize_text',
		)
 );
 $wp_customize->add_control(
		'presentation_subtitle',
		array(
				'type'        => 'text',
				'label'       => esc_html__('Sous-titre:', 'emp'),
				'section'     => 'section_presentation',
		)
 );
 //presentation texte
 $wp_customize->add_setting(
		 'presentation_texte',
		 array(
				 'default'           => '',
				 'sanitize_callback' => 'emp_sanitize_text',
		 )
 );
 $wp_customize->add_control(
		 'presentation_texte',
		 array(
				 'type'        => 'textarea',
				 'label'       => esc_html__('Texte:', 'emp'),
				 'section'     => 'section_presentation',
		 )
 );


 //music //
  $wp_customize->add_section(
 		 'section_music',
 		 array(
 				 'title'         => __('Section Music', 'emp'),
 				 'priority'      => 11,
 				 'panel'         => 'emp_section_panel',
 		 )
  );

  // Show section
  $wp_customize->add_setting( 'music_disable',
 		 array(
 				 'sanitize_callback' => 'emp_sanitize_checkbox',
 				 'default'           => '',
 		 )
  );
  $wp_customize->add_control( 'music_disable',
 		 array(
 				 'type'        => 'checkbox',
 				 'label'       => esc_html__('cacher cette section ?', 'emp'),
 				 'section'     => 'section_music',
 		 )
  );

	//music title
	$wp_customize->add_setting(
			'music_title',
			array(
					'default'           => '',
					'sanitize_callback' => 'emp_sanitize_text',
			)
	);
	$wp_customize->add_control(
			'music_title',
			array(
					'type'        => 'text',
					'label'       => esc_html__('Titre de la section', 'emp'),
					'section'     => 'section_music',
			)
	);

	//music texte
	$wp_customize->add_setting(
			'music_text',
			array(
					'default'           => '',
					'sanitize_callback' => 'emp_sanitize_text',
			)
	);
	$wp_customize->add_control(
			'music_text',
			array(
					'type'        => 'textarea',
					'label'       => esc_html__('Description du morceau', 'emp'),
					'section'     => 'section_music',
			)
	);


	//music btn
	$wp_customize->add_setting(
			'music_texte_btn_url',
			array(
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			'music_texte_btn_url',
			array(
					'label' 	=> __( 'Lien du bouton', 'emp' ),
					'section' 	=> 'section_music',
					'type' 		=> 'text',
			)
	);
	$wp_customize->add_setting(
			'music_texte_btn_title',
			array(
					'sanitize_callback' => 'emp_sanitize_text',
			)
	);
	$wp_customize->add_control(
			'music_texte_btn_title',
			array(
					'label' 	=> __( 'Texte du bouton', 'emp' ),
					'section' 	=> 'section_music',
					'type' 		=> 'text',
			)
	);

	//music liens
	$wp_customize->add_control( new Emp_Info( $wp_customize, 'music' . $c, array(
			'label' => __('Options ', 'emp'),
			'section' => 'section_music',
			'settings' => array(),
			) )
	);

// spotify url
	$wp_customize->add_setting(
			'music_texte_btn_url_spotify',
			array(
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			'music_texte_btn_url_spotify',
			array(
					'label' 	=> __( 'Lien spotify', 'emp' ),
					'section' 	=> 'section_music',
					'type' 		=> 'text',
			)
	);
	// soundclound url
		$wp_customize->add_setting(
				'music_texte_btn_url_soundcloud',
				array(
						'sanitize_callback' => 'esc_url_raw',
				)
		);
		$wp_customize->add_control(
				'music_texte_btn_url_soundcloud',
				array(
						'label' 	=> __( 'Lien soundClound', 'emp' ),
						'section' 	=> 'section_music',
						'type' 		=> 'text',
				)
		);
		// itunes url
			$wp_customize->add_setting(
					'music_texte_btn_url_itunes',
					array(
							'sanitize_callback' => 'esc_url_raw',
					)
			);
			$wp_customize->add_control(
					'music_texte_btn_url_itunes',
					array(
							'label' 	=> __( 'Lien iTunes', 'emp' ),
							'section' 	=> 'section_music',
							'type' 		=> 'text',
					)
			);

			// Show playing bar
			$wp_customize->add_setting( 'music_disable_playing',
				 array(
						 'sanitize_callback' => 'emp_sanitize_checkbox',
						 'default'           => '',
				 )
			);
			$wp_customize->add_control( 'music_disable_playing',
				 array(
						 'type'        => 'checkbox',
						 'label'       => esc_html__('Cacher les options du player ?', 'emp'),
						 'description' => esc_html__('Affiche la barre en bas de page [par defaut]', 'emp'),
						 'section'     => 'section_music',
				 )
			);

			//services //
			$wp_customize->add_section(
				 'section_services',
				 array(
						 'title'         => __('Section Services', 'emp'),
						 'priority'      => 12,
						 'panel'         => 'emp_section_panel',
				 )
			);

			// Show section
			$wp_customize->add_setting( 'services_disable',
				 array(
						 'sanitize_callback' => 'emp_sanitize_checkbox',
						 'default'           => '',
				 )
			);
			$wp_customize->add_control( 'services_disable',
				 array(
						 'type'        => 'checkbox',
						 'label'       => esc_html__('cacher cette section ?', 'emp'),
						 'section'     => 'section_services',
				 )
			);

			//services title section
			$wp_customize->add_setting(
					'services_title_section',
					array(
							'default'           => '',
							'sanitize_callback' => 'emp_sanitize_text',
					)
			);
			$wp_customize->add_control(
					'services_title_section',
					array(
							'type'        => 'text',
							'label'       => esc_html__('Titre de la section', 'emp'),
							'section'     => 'section_services',
					)
			);

			//style services
			$wp_customize->add_setting(
					'services_style',
					array(
						'default'           => '',
						'sanitize_callback' => 'emp_sanitize_text',
					)
				);

			$wp_customize->add_control(
					'services_style',
						array(
							'label'		=> esc_html__('Mode d\'affichage','emp'),
							'type'		=> 'select',
							'section'	=> 'section_services',
							'choices'	=> array(
									'service-style-inline' => esc_html__('inline'),
									'services-style-list' 	 => esc_html__('liste'),
							)
						)
				);

				//class services
				$wp_customize->add_setting(
						'services_class',
						array(
							'default'           => '',
							'sanitize_callback' => 'emp_sanitize_text',
						)
					);

				$wp_customize->add_control(
						'services_class',
						array(
							'label'		=> esc_html__('Style','emp'),
							'description' => esc_html__('largeur du conteneur','emp'),
							'type'		=> 'select',
							'section'	=> 'section_services',
							'choices'	=> array(
									'container' => esc_html__('container','emp'),
									'container-fluid' => esc_html__('container-fluid','emp'),
							)
						)
					);

					//contact //
					$wp_customize->add_section(
						 'section_contact',
						 array(
								 'title'         => __('Section Contact', 'emp'),
								 'priority'      => 13,
								 'panel'         => 'emp_section_panel',
						 )
					);

					// Show section
					$wp_customize->add_setting( 'contact_disable',
						 array(
								 'sanitize_callback' => 'emp_sanitize_checkbox',
								 'default'           => '',
						 )
					);
					$wp_customize->add_control( 'contact_disable',
						 array(
								 'type'        => 'checkbox',
								 'label'       => esc_html__('cacher cette section ?', 'emp'),
								 'section'     => 'section_contact',
						 )
					);

					// contact style
					$wp_customize->add_setting( 'contact_style',
						 array(
								 'sanitize_callback' => 'emp_sanitize_text',
								 'default'           => '',
						 )
					);
					$wp_customize->add_control( 'contact_style',
						array(
							'label'		=> esc_html__('Style','emp'),
							'type'		=> 'select',
							'section'	=> 'section_contact',
							'choices'	=> array(
									'contact-bg-img' => esc_html__('Fond avec image','emp'),
									'contact-bg-color' => esc_html__('Fond de couleur','emp'),
							)
						)
					);

					// contact-img
					$wp_customize->add_setting(
							 'contact_img',
							 array(
									 'default' =>'',
									 'sanitize_callback' => 'esc_url_raw',
							 )
					 );
					 $wp_customize->add_control(
							 new WP_Customize_Image_Control(
									 $wp_customize,
								 'contact_img',
									 array(
											'label'     => __( 'Image de fond', 'emp' ),
											'type'      => 'image',
											'section'   => 'section_contact',
									 )
							 )
					 );

					// txt
					$wp_customize->add_setting(
						'contact_txt',
						array(
								'default'           => '',
								'sanitize_callback' => 'emp_sanitize_text',
						)
					);
					$wp_customize->add_control(
						'contact_txt',
						array(
							'type'        => 'textarea',
							'label'       => esc_html__('Texte de la section', 'emp'),
							'section'     => 'section_contact',
						)
					);

					//contact btn
					$wp_customize->add_setting(
							'contact_btn_url',
							array(
									'sanitize_callback' => 'esc_url_raw',
							)
					);
					$wp_customize->add_control(
							'contact_btn_url',
							array(
									'label' 	=> __( 'Lien du bouton', 'emp' ),
									'section' 	=> 'section_contact',
									'type' 		=> 'text',
							)
					);

					$wp_customize->add_setting(
							'contact_txt_btn',
							array(
									'sanitize_callback' => 'emp_sanitize_text',
							)
					);
					$wp_customize->add_control(
							'contact_txt_btn',
							array(
									'label' 	=> __( 'Texte du bouton', 'emp' ),
									'section' 	=> 'section_contact',
									'type' 		=> 'text',
							)
					);

		/**
		 * contact
		 */
		 $wp_customize->add_section( 'contact_infos' , array(
		    'title'      => __('Contact page','emp'),
		    'priority'   => 28,

		 ) );
		 // city
		 $wp_customize->add_setting(
			 'contact_city',
			 array(
					 'default'           => '',
					 'sanitize_callback' => 'emp_sanitize_text',
			 )
		 );
		 $wp_customize->add_control(
			 'contact_city',
			 array(
				 'type'        => 'text',
				 'label'       => esc_html__('Ville', 'emp'),
				 'priority'   => 1,
				 'section'     => 'contact_infos',
			 )
		 );

		 // phone
		 $wp_customize->add_setting(
			 'contact_phone',
			 array(
					 'default'           => '',
					 'sanitize_callback' => 'emp_sanitize_text',
			 )
		 );
		 $wp_customize->add_control(
			 'contact_phone',
			 array(
				 'type'        => 'text',
				 'label'       => esc_html__('Téléphone', 'emp'),
				 'priority'   => 2,
				 'section'     => 'contact_infos',
			 )
		 );

		 // email
		 $wp_customize->add_setting(
			 'contact_email',
			 array(
					 'default'           => '',
					 'sanitize_callback' => 'emp_sanitize_text',
			 )
		 );
		 $wp_customize->add_control(
			 'contact_email',
			 array(
				 'type'        => 'text',
				 'label'       => esc_html__('Email', 'emp'),
				 'priority'   => 3,
				 'section'     => 'contact_infos',
			 )
		 );


		/**
		 * color theme
		 */

		 // titre body color
		 $wp_customize->add_control( new Emp_Info( $wp_customize, 'colors_body', array(
				 'label' 		=> __('Body ', 'emp'),
				 'section' 	=> 'colors',
				 'settings' => array(),
				 'priority' => 3,
				 ) )
		 );

		 //body color
		 $wp_customize->add_control(
				 new WP_Customize_Color_Control(
						 $wp_customize,
						 'background_color',
						 array(
								 'label' 			=> __('Couleur de fond', 'emp'),
								 'section' 		=> 'colors',
								 'priority' 	=> 4,
						 )
				 )
		 );

		 //texte color
		 $wp_customize->add_setting(
			 	'txt_body_color',
				array(
						'default' 					=> $defaults['txt_body_color'],
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'					=> 'postMessage'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'txt_body_color',
					array(
							'label'			=> __('Couleur du texte', 'emp'),
							'section' 	=> 'colors',
							'priority' 	=> 5,
					))
			);

		 //titre color menu
		 $wp_customize->add_control( new Emp_Info( $wp_customize, 'menu', array(
				 'label' => __('Navigation ', 'emp'),
				 'section' => 'colors',
				 'settings' => array(),
				 'priority' => 6,
				 ) )
		 );

		 //color background nav
			 $wp_customize->add_setting(
				 'alpha_color_setting',
				 array(
					 'default' => 'rgba(255, 255, 255, 0.7)',
					 'type' => 'theme_mod',
					 'capability' => 'edit_theme_options',
					 'transport' => 'postMessage'
				 )
			 );

			 $wp_customize->add_control(
					new Customize_Alpha_Color_Control(
							 $wp_customize,
							 'alpha_color_control',
							 array(
								 'label' => __('Couleur de fond du menu', 'emp'),
								 'section' => 'colors',
								 'settings' => 'alpha_color_setting',
								 'show_opacity' => true,
								 'priority' 	=> 7,
								 // 'palette' => array(
									// 	 'rgb(150, 50, 220)',
									// 	 'rgba(50, 50, 50, 0.8)',
									// 	 'rgba(255, 255, 255, 0.2)',
									// 	 '#00cc99'
								 // )
							 )
						)
				 );

				 //color liens navigation
				 $wp_customize->add_setting(
						'txt_nav_color',
						array(
								'default' 					=> $defaults['txt_nav_color'],
								'sanitize_callback' => 'sanitize_hex_color',
								'transport'					=> 'postMessage'
						)
					);
					$wp_customize->add_control(
						new WP_Customize_Color_Control(
							$wp_customize,
							'txt_nav_color',
							array(
									'label'			=> __('Couleur des liens & logo', 'emp'),
									'section' 	=> 'colors',
									'priority' 	=> 8,
							))
					);

					//titre color principal
					$wp_customize->add_control( new Emp_Info( $wp_customize, 'site_color', array(
							'label' => __('Couleur du thème ', 'emp'),
							'section' => 'colors',
							'settings' => array(),
							'priority' => 9,
							) )
					);

					//color primary
					$wp_customize->add_setting(
						 'color_primary',
						 array(
								 'default' 					=> $defaults['color_primary'],
								 'sanitize_callback' => 'sanitize_hex_color',
								 'transport'					=> 'postMessage'
						 )
					 );
					 $wp_customize->add_control(
						 new WP_Customize_Color_Control(
							 $wp_customize,
							 'color_primary',
							 array(
									 'label'			=> __('Couleur principale', 'emp'),
									 'section' 	=> 'colors',
									 'priority' 	=> 10,
							 ))
					 );

					 //titre color section music
					 $wp_customize->add_control( new Emp_Info( $wp_customize, 'music_color', array(
							 'label' => __('Couleur section music ', 'emp'),
							 'section' => 'colors',
							 'settings' => array(),
							 'priority' => 11,
							 ) )
					 );

					 //color section music top
					 $wp_customize->add_setting(
							'color_section_music',
							array(
									'default' 					=> $defaults['color_section_music'],
									'sanitize_callback' => 'sanitize_hex_color',
									'transport'					=> 'postMessage'
							)
						);
						$wp_customize->add_control(
							new WP_Customize_Color_Control(
								$wp_customize,
								'color_section_music',
								array(
										'label'			=> __('Couleur du block du haut', 'emp'),
										'section' 	=> 'colors',
										'priority' 	=> 12,
								))
						);

						//color section music bottom
						$wp_customize->add_setting(
							 'color_section_music_bottom',
							 array(
									 'default' 					=> $defaults['color_section_music_bottom'],
									 'sanitize_callback' => 'sanitize_hex_color',
									 'transport'					=> 'postMessage'
							 )
						 );
						 $wp_customize->add_control(
							 new WP_Customize_Color_Control(
								 $wp_customize,
								 'color_section_music_bottom',
								 array(
										 'label'			=> __('Couleur du block du bas', 'emp'),
										 'section' 	=> 'colors',
										 'priority' 	=> 13,
								 ))
						 );

						//color txt name artist
						$wp_customize->add_setting(
							 'color_txt_name_artist',
							 array(
									 'default' 					=> $defaults['color_txt_name_artist'],
									 'sanitize_callback' => 'sanitize_hex_color',
									 'transport'					=> 'postMessage'
							 )
						 );
						 $wp_customize->add_control(
							 new WP_Customize_Color_Control(
								 $wp_customize,
								 'color_txt_name_artist',
								 array(
										 'label'			=> __('Couleur du texte du nom de l\'artist', 'emp'),
										 'section' 	=> 'colors',
										 'priority' 	=> 14,
								 ))
						 );

						 //color titre page music
						 $wp_customize->add_setting(
								'music_title_color',
								array(
										'default' 					=> $defaults['music_title_color'],
										'sanitize_callback' => 'sanitize_hex_color',
										'transport'					=> 'postMessage'
								)
							);
							$wp_customize->add_control(
								new WP_Customize_Color_Control(
									$wp_customize,
									'music_title_color',
									array(
											'label'			=> __('Couleur du titre de la section', 'emp'),
											'section' 	=> 'colors',
											'priority' 	=> 15,
									))
							);



}
add_action( 'customize_register', 'emp_customize_register' );

/**
 * Sanitize
 */
//Header type
function emp_sanitize_header( $input ) {
    if ( in_array( $input, array( 'has-image', 'has-slider'), true ) ) {
        return $input;
    }
}
//Text
function emp_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}



//Checkboxes
function emp_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function emp_customize_preview_js() {
	wp_enqueue_script( 'emp-app-custom', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'emp_customize_preview_js' );

/**
* load color picker alpha
*/
function emp_load_customize_alpha_color(){
	// Inclut le fichier de contrôle Alpha Color Picker.
	require_once( dirname( __FILE__ ) . '/alpha-color-picker/alpha-color-picker.php' );
}
add_action('customize_register', 'emp_load_customize_alpha_color', 0);
