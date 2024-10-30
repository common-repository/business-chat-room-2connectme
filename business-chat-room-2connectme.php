<?php     
/*
Plugin Name: Business Live Chat - 2ConnectMe
Plugin URI: https://www.2connectme.com
Description: Business Chat Room helps connect your customer with text chat, voice talk or even video call to you instantly.
Version: 1.7.0
Author: 2ConnectMe Limited
Text Domain: business-chat-room-2connectme
Domain Path: /languages
License: GPLv2 or later

The plugin is based on the plugin myStickyElements to develop. myStickyElemnts plugin information is as follows.
myStickyElements Plugin URI: http://wordpress.transformnews.com/plugins/mystickyelements-simple-sticky-side-elements-for-wordpress-504
myStickyElements Description: myStickyElements is simple yet very effective plugin. It is perfect to fill out usually unused side space on webpages with some additional messages, videos, social widgets ...
myStickyElements Version: 1.2
myStickyElements Author: m.r.d.a
myStickyElements License: GPLv2 or later
*/

defined('ABSPATH') or die("Cannot access pages directly.");

class livechat2connectmeelementsPage
{
    private $options;
	
    public function __construct()
    {
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );	
		add_action( 'admin_init', array( $this, 'page_init' ) );	
		add_action( 'admin_init', array( $this, 'livechat2connectmeelement_load_transl') );
		add_action( 'admin_init', array( $this, 'livechat_2connectme_elements_default_options' ) );
		add_action( 'admin_enqueue_scripts',  array( $this, 'mw_enqueue_color_picker' ) );
		
    }
	
	public function livechat2connectmeelement_load_transl()
	{
		load_plugin_textdomain('live-chat-2connectme', FALSE, dirname(plugin_basename(__FILE__)).'/languages/');
	}


    public function add_plugin_page()
    {		
        add_options_page(
            'Settings Admin', 
            'Business Chat Room - 2ConnectMe', 
            'manage_options', 
            'live-chat-2connectme-elements-settings',
            array( $this, 'create_admin_page' )
        );
	}
	
    public function create_admin_page() {

		$this->options9 = get_option( 'livechat_2connectme_elements_options9');
		?>
			<p> <span style="font-size:18px;font-weight:bold;">Helpers:</span>
				<a style='font-size:18px;margin:10px;word-break:keep-all;' href=https://2connectme.com/index.php/documentation/starts-to-serve-customers-in-5-minutes/ target=_blank>Quick_Basic_Setup_in_5_minutes?</a>  
				<a style='font-size:18px;margin:10px;word-break:keep-all;' href=https://2connectme.com/index.php/documentation/initial-settings-wizard/ target=_blank>Initial_Settings_Wizard?</a>  
				<a style='font-size:18px;margin:10px;word-break:keep-all;' href=https://2connectme.com/index.php/documentation/chat-room-customizations/ target=_blank>Chat_Room/Contact_Form_Settings?</a>  
				<a style='font-size:18px;margin:10px;word-break:keep-all;' href=https://2connectme.com/index.php/documentation/whatsapp-chats-distribution-how-to/ target=_blank>WhatsApp_Chats_Distribution?</a>  
				<a style='font-size:18px;margin:10px;word-break:keep-all;' href=https://2connectme.com/index.php/documentation/ target=_blank>Documentation_Helpers?</a>
			</p>		

			
			<div style="font-size:16px;">
				<div>
				2ConnectMe platform is composed of "Customer Client" and "Service Staff". "Customer Client" app starts with Contact Form in this plugin to be setup. For "Service Staff" app, it requires you to register with 2ConnectMe as a service staff either in "Solo User" or "Company" account. 
				</div>

				<br>
				
				<div>
				For the 1st time user, it is highly recommended to register as "Solo User" account as it comes with default settings on pre-configured chat rooms. It lets you quickly try our services without further settings required. When your business requires full customisation on the services, e.g. customisation of contact form, white label setup, how to distribute the customer chats to your team, you will have to register another new "Company" type account to start settings all over again.
				</div>

				<br>
				<div>
				<span style="font-size:18px;font-weight:bold;">Summary of 5 minutes setup procedures</span>
									
					<ol style="list-style-position: inside; list-style-type: decimal;">
						<li>
							Register your business on 2ConnectMe Platform either in "Solo User" or "Company" type account. 
							<a style='word-break:keep-all;' href=https://www.2connectme.com/agentLogon.html#LIxFaEi%2BIElB56WBJG2r85M%2FVS0nYk7nPJh%2F89qK33M%2FfkIkqGPCcyBESwjSDSoHFaCj10pm%2Fe0%3D target=_blank>Register Service Staff here</a>  
						</li>
						<li>
							Put the URL of chat room in the plugin settings "PopUp Form Url" below. After successful registration, you will receive an email from 2connectme.com with the URL of chat room information. Just copy and paste such URL of chat room to "PopUp Form Url" settings below.  If no such email is found, please check your spam / junk email box.
						</li>
						<li>
							For your initial trial testing, you may keep all the defualt settings and "Save Changes" on the settings of plugin below. The sticky chat button should be shown at your left buttom, by default, of your website now. The contact form is pop up once such chat button is clicked.
						</li>
						<li>
							Follow the usage cheat sheet for <a style='word-break:keep-all;' href=	https://www.2connectme.com/index.php/documentation/usage-cheat-sheet-service-staff/ target=_blank>service staff</a> and for  <a style='word-break:keep-all;' href=https://www.2connectme.com/index.php/documentation/usage-cheat-sheet-client-customer/ target=_blank>customer</a>. It starts to serve your online chats from customer immediately. 
						</li>
						<li>
							We also have mobile app for Service Staff in <a style='word-break:keep-all;' href=https://apps.apple.com/us/app/connectme-agent-video-chat/id1092378987 target=_blank>Apple App Store</a> and <a style='word-break:keep-all;' href=https://play.google.com/store/apps/details?id=com.toconnectme.android target=_blank>Google Play store</a>. The mobile app will notify you whenver there is any customer visiting your website. They empower service staff to answer incoming chats from customer at any time any place.
						</li>						
						
					</ol>					
			    </div>
				
				<div>
					For any assistance, feel free <a style='word-break:keep-all;' href=https://www.2connectme.com/custPhoneSP.html#+BoM8FKFdTBd4juTGuqdeJdzUDeXsrZOql9VT0A2wPVcA4OLBJiNlR8i11VmAVOmWGGSw/TUSkX+vLlH target=_blank>contact us</a> at any time. We provide support 7x24 support. We will reply to your questions within 12 hours in case no free live service staff available.
					
				</div>
			<div>

			<h3 id="2connectme_warning" style="background-color:black;color:red;padding:10px;width:95%;display:none;max-height:80px;overflow:auto;"></h3>
		
			<div id="2connectme_wpsettings" style="display:block;" class="wrap">
				<?php screen_icon(); ?>
				<h2><?php _e( 'Business Chat Room - 2ConnectMe', 'live-chat-2connectme-elements' ); ?></h2>
				
			<?php $active_tab = 'element_1' ?> 
				
				<h2 class="nav-tab-wrapper">
					<a href="?page=live-chat-2connectme-elements-settings&tab=element_1" class="nav-tab <?php echo $active_tab == 'element_1' ? 'nav-tab-active' : ''; ?>">Settings</a> 
				</h2>

				<form method="post" action="options.php">
				<?php
						settings_fields( 'livechat_2connectme_elements_option_group9' );
						do_settings_sections( 'live-chat-2connectme-elements-settings9' );
					submit_button(); 
				?>
				</form>
			</div>
			
			<?php
	}
	
  
    public function page_init()
    {   
		global $id, $title, $callback, $page;   

		register_setting(
            'livechat_2connectme_elements_option_group9',
            'livechat_2connectme_elements_options9',
            array( $this, 'sanitize' ) 
        );
		

		add_settings_field( $id, $title, $callback, $page, $section = 'default', $args = array() );
	
		   //** First element 9  **//	
		 
		 add_settings_section(
            'setting_section_id', // ID
			__("PopUp Form & Floating Button Options", 'livechat2connectmeelements'), // Title
            array( $this, 'print_section_info9' ), // Callback
            'live-chat-2connectme-elements-settings9' // Page
		);

		
		add_settings_field(
            'myfixed_element_enable',
            __("Enable", 'livechat2connectmeelements'), 
            array( $this, 'myfixed_element9_enable_callback' ),
            'live-chat-2connectme-elements-settings9',
            'setting_section_id'         
		);	
	
	
		add_settings_field(
            'myfixed_element_side_position',
            __("Sticky button Position", 'livechat2connectmeelements'),
            array( $this, 'myfixed_element9_side_position_callback' ),
            'live-chat-2connectme-elements-settings9',
            'setting_section_id'
        );

		add_settings_field(
            'myfixed_element_icon_bg_img',
            __("Sticky button Icon & Size", 'livechat2connectmeelements'),
            array( $this, 'myfixed_element9_icon_bg_img_callback' ),
            'live-chat-2connectme-elements-settings9',
            'setting_section_id'
		);		
	

		add_settings_field(
            'myfixed_element_icon_bg_color',
            __("Sticky button Color", 'livechat2connectmeelements'),
            array( $this, 'myfixed_element9_icon_bg_color_callback' ),
            'live-chat-2connectme-elements-settings9',
            'setting_section_id'
		);		

		
		add_settings_field(
            'myfixed_disable_small_screen', 
            __("Disable at Small Screen Sizes", 'livechat2connectmeelements'),
            array( $this, 'myfixed_disable_small_screen_callback' ), 
            'live-chat-2connectme-elements-settings9', 
            'setting_section_id'
        );
		
		add_settings_field(
            'myfixed_click', 
            __("Change on Event", 'livechat2connectmeelements'),
            array( $this, 'myfixed_click_callback' ), 
            'live-chat-2connectme-elements-settings9', 
            'setting_section_id'
		);
		
		add_settings_field(
            'myfixed_element_content_bg_color',
            __("Whisper Background Color <p><a href=https://2connectme.com/index.php/documentation/auto-whisper-triggers/ target=_blank>Auto Whisper Triggers?</a></p>", 'livechat2connectmeelements'),
            array( $this, 'myfixed_element9_content_bg_color_callback' ),
            'live-chat-2connectme-elements-settings9',
            'setting_section_id'
		);
		
		add_settings_field(
            'myfixed_element_content_txt_color',
            __("Whisper Text Color", 'livechat2connectmeelements'),
            array( $this, 'myfixed_element9_content_txt_color_callback' ),
            'live-chat-2connectme-elements-settings9',
            'setting_section_id'
		);
		

		add_settings_field(
            'myfixed_element_content',
            __("PopUp Form Url from 2ConnectMe Amomynous Chat Room Settings<p>	<a style='word-break:keep-all;' href=https://2connectme.com/index.php/documentation/chat-room-customizations/ target=_blank>Chat_Room/Contact_Form_Settings?</a>  
			", 'livechat2connectmeelements'),
            array( $this, 'myfixed_element9_content_callback' ),
            'live-chat-2connectme-elements-settings9',
            'setting_section_id'
		);	
				
    }

  
	
    /**
     * Sanitize each setting field as needed
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
		
        $new_input = array();
        if( isset( $input['myfixed_element_enable'] ) )
			$new_input['myfixed_element_enable'] = sanitize_text_field( $input['myfixed_element_enable'] );
			
		if( isset( $input['myfixed_disable_small_screen'] ) )
            $new_input['myfixed_disable_small_screen'] = absint( $input['myfixed_disable_small_screen'] );			
			
		if( isset( $input['myfixed_click'] ) )
            $new_input['myfixed_click'] = sanitize_text_field( $input['myfixed_click'] ); 
			
		if( isset( $input['myfixed_element_side_position'] ) )
            $new_input['myfixed_element_side_position'] = sanitize_text_field( $input['myfixed_element_side_position'] );

		if( isset( $input['myfixed_element_icon_bg_color'] ) )
            $new_input['myfixed_element_icon_bg_color'] = sanitize_text_field( $input['myfixed_element_icon_bg_color'] );
		
		if( isset( $input['myfixed_element_icon_bg_img'] ) ) 
		    $new_input['myfixed_element_icon_bg_img'] = sanitize_text_field( $input['myfixed_element_icon_bg_img'] );
			
		if( isset( $input['myfixed_element_content_bg_color'] ) )
            $new_input['myfixed_element_content_bg_color'] =  sanitize_text_field( $input['myfixed_element_content_bg_color'] );	

		if( isset( $input['myfixed_element_content_txt_color'] ) )
            $new_input['myfixed_element_content_txt_color'] =  sanitize_text_field( $input['myfixed_element_content_txt_color'] );				
			
		if( isset( $input['myfixed_element_content_padding'] ) )
            $new_input['myfixed_element_content_padding'] =  absint( $input['myfixed_element_content_padding'] );	
		

		if( isset( $input['myfixed_element_content'] ) )
			$new_input['myfixed_element_content'] =  wp_kses($input['myfixed_element_content'],
				array( 
				'a' => array(
						'href' => array(),
						'title' => array(),
						'target' => array(),
						'rel' => array()
						),
				'br' => array(),
				'h1' => array(),
				'h2' => array(),
				'h3' => array(),
				'h4' => array(),
				'h5' => array(),
				'h6' => array(),
				'&nbsp;' => array(),
				'hr' => array(),
				'p' => array(),
				'em' => array(),
				'strong' => array(),
				'ul' => array(),
				'ol' => array(),
				'li' => array(),
				'blockquote' => array(),
				'iframe' => array(
						'id' => array(),
						'src' => array(),
						'width' => array(),
						'height' => array(),
						'frameborder' => array(),
						'allowfullscreen' => array(),
						'scrolling' => array(),
						'style' => array(),
						'allowtransparency' => array()
						),
				'img' => array(
						'src' => array(),
						'alt' => array(),
						'class' => array(),
						'width' => array(),
						'height' => array(),
						'rel' => array()
						),
				'span' => array(
						'style' => array(),
						'class' => array()
						)

				) 
			);

        return $new_input;
    }
	
	 /**
     * Load Defaults
     */ 	
	public function livechat_2connectme_elements_default_options() {
		
		global $options;
		
		$default9 = array(
				'myfixed_disable_small_screen' => '1',
				'myfixed_click' => 'click',
				'myfixed_element_enable' => 'enable',
				'myfixed_element_side_position' => 'left',
				'myfixed_element_icon_bg_color' => '#1e73be',
				'myfixed_element_icon_bg_img' => '/img/chat.png',
				'myfixed_element_content_bg_color' => '#1e73be',
				'myfixed_element_content_txt_color' => 'white',
				'myfixed_element_content_width' => '500',
				'myfixed_element_content_height' => '500',
				'myfixed_element_content_padding' => '20',
				'myfixed_element_content' => '',			
			);
		 
		if ( get_option('livechat_2connectme_elements_options9') == false )  {			
			update_option( 'livechat_2connectme_elements_options9', $default9 );
		}

}

		
	public  function mw_enqueue_color_picker(  ) 
	{
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'my-script-handle', plugins_url('js/iris-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}


	 
	 /* ***** GENERAL ***** */
	 
    public function print_section_info()
    {
        print __('General Behaviors Options', 'livechat2connectmeelements');
		
    }

    /** 
     * Get the settings option array and print one of its values
     */
	
	public function myfixed_disable_small_screen_callback()
	{
		printf(
		'<p class="description">'. __('less than ', 'livechat2connectmeelements') .'<input type="text" size="4" id="myfixed_disable_small_screen" name="livechat_2connectme_elements_options9[myfixed_disable_small_screen]" value="%s" />'. __('px width, 0 means DISABLE, 1 means ENABLE for all mobile devices', 'livechat2connectmeelements') .'</p>',
            isset( $this->options9['myfixed_disable_small_screen'] ) ? esc_attr( $this->options9['myfixed_disable_small_screen']) : ''
		);
	}
	
	
	public function myfixed_click_callback()
	{
		printf(
		'<select id="myfixed_click" name="livechat_2connectme_elements_options9[myfixed_click]" selected="%s">',
			isset( $this->options9['myfixed_click'] ) ? esc_attr( $this->options9['myfixed_click']) : '' 
		);
		if ($this->options9['myfixed_click'] == 'click') {
		printf(
		'<option name="click" value="click" selected>'. __('click', 'livechat2connectmeelements') .'</option>
		<option name="hover" value="hover">'. __('hover', 'livechat2connectmeelements') .'</option>
		</select>'
		);	
		}
		if ($this->options9['myfixed_click'] == 'hover') {
		printf(
		'<option name="click" value="click">'. __('click', 'livechat2connectmeelements') .'</option>
		<option name="hover" value="hover" selected >'. __('hover', 'livechat2connectmeelements') .'</option>
		</select>'
		);	
		}
		if ($this->options9['myfixed_click'] == '') {
		printf(
		'<option name="click" value="click" selected>'. __('click', 'livechat2connectmeelements') .'</option>
		<option name="hover" value="hover">'. __('hover', 'livechat2connectmeelements') .'</option>
		</select>'
		);	
		}			
	} 
	
	
	/* ***** ELEMENT 1 ***** */
	
	public function print_section_info9()
    {
		
    }
	
	 
	 public function myfixed_element9_enable_callback()
	{	
		printf(
		'<select id="myfixed_element_enable" name="livechat_2connectme_elements_options9[myfixed_element_enable]" selected="%s">',
			isset( $this->options9['myfixed_element_enable'] ) ? esc_attr( $this->options9['myfixed_element_enable']) : '' 
		);
		if ($this->options9['myfixed_element_enable'] == 'enable') {
			printf(
		'<option name="enable" value="enable" selected>enable</option>
		<option name="disable" value="disable">disable</option>
		</select>'
		);	
		}
		if ($this->options9['myfixed_element_enable'] == 'disable') {
			printf(
		'<option name="enable" value="enable">enable</option>
		<option name="disable" value="disable" selected >disable</option>
		</select>'
		);	
		}
		if ($this->options9['myfixed_element_enable'] == '') {
			printf(
		'<option name="enable" value="enable" >enable</option>
		<option name="disable" value="disable" selected >disable</option>
		</select>'
		);

		}		
    }
	 
	public function myfixed_element9_side_position_callback()
	{	
		printf(
		'<select id="myfixed_element_side_position" name="livechat_2connectme_elements_options9[myfixed_element_side_position]" selected="%s">',
			isset( $this->options9['myfixed_element_side_position'] ) ? esc_attr( $this->options9['myfixed_element_side_position']) : '' 
		);

		if ($this->options9['myfixed_element_side_position'] == 'left') {
			printf(
		'<option name="left" value="left" selected>left bottom</option>
		<option name="left_middle" value="left_middle">left middle</option>
		<option name="right" value="right">right bottom</option>	
		<option name="right_middle" value="right_middle">right middle</option>
		</select>'
		);	
		}

		if ($this->options9['myfixed_element_side_position'] == 'left_middle') {
			printf(
		'<option name="left" value="left">left bottom</option>		
		<option name="left_middle" value="left_middle" selected>left middle</option>
		<option name="right" value="right">right bottom</option>
		<option name="right_middle" value="right_middle">right middle</option>
		</select>'
		);	
		}	

		if ($this->options9['myfixed_element_side_position'] == 'right') {
			printf(
		'<option name="left" value="left">left bottom</option>
		<option name="left_middle" value="left_middle">left middle</option>
		<option name="right" value="right" selected>right bottom</option>	
		<option name="right_middle" value="right_middle">right middle</option>
		</select>'
		);	
		}	
	
		if ($this->options9['myfixed_element_side_position'] == 'right_middle') {
			printf(
		'<option name="left" value="left">left bottom</option>
		<option name="left_middle" value="left_middle">left middle</option>
		<option name="right" value="right" >right bottom</option>		
		<option name="right_middle" value="right_middle" selected>right middle</option>
		</select>'
		);	
		}	

		if ($this->options9['myfixed_element_side_position'] == '') {
			printf(
		'<option name="left" value="left" selected>left bottom</option>
		<option name="left_middle" value="left_middle">left middle</option>			
		<option name="right" value="right">right bottom</option>
		<option name="right_middle" value="right_middle" selected>right middle</option>
		</select>'
		);	
		}	
	}
	
	
	public function myfixed_element9_icon_bg_color_callback()
    {
        printf(
            '<p class="description"><input type="text" size="8" id="myfixed_element_icon_bg_color" name="livechat_2connectme_elements_options9[myfixed_element_icon_bg_color]" value="%s" class="my-color-field" /></p>',
            isset( $this->options9['myfixed_element_icon_bg_color'] ) ? esc_attr( $this->options9['myfixed_element_icon_bg_color']) : '' 
        );
    }
	


	public function myfixed_element9_icon_bg_img_callback()
    {
        printf(
            '<select class="chatIcon" id="myfixed_element_icon_bg_img" name="livechat_2connectme_elements_options9[myfixed_element_icon_bg_img]" selected="%s">',
            isset( $this->options9['myfixed_element_icon_bg_img'] ) ? esc_attr( $this->options9['myfixed_element_icon_bg_img']) : '' 
		);
		
		if ($this->options9['myfixed_element_icon_bg_img'] == "/img/chat.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png" selected>Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}
		
		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/chat-medium.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png" selected>Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		} 
		
		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/chat-small.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png" selected>Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}

		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/phone.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png" selected>Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}

		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/phone-medium.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png" selected>Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}

		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/phone-small.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png" selected>Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}

		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/video.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png" selected>Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}

		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/video-medium.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png" selected>Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}

		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/video-small.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png" selected>Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}

		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/mail.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png" selected>Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}

		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/mail-medium.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png" selected>Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}

		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/mail-small.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png" selected>Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}
		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/whatsapp.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png" selected>Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}
		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/whatsapp-medium.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png" selected>Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}
		elseif ($this->options9['myfixed_element_icon_bg_img'] == "/img/whatsapp-small.png") {
			printf(
		'<option name="chat-large" value="/img/chat.png">Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png" selected>Whatsapp-small (30x30)</option>
		</select>'
		);
		}
				
		else{
			printf(
		'<option name="chat-large" value="/img/chat.png" selected>Chat-large (50x50)</option>
		<option name="chat-medium" value="/img/chat-medium.png">Chat-medium (40x40)</option>
		<option name="chat-small" value="/img/chat-small.png">Chat-small (30x30)</option>
		<option name="phone-large" value="/img/phone.png">Phone-large (50x50)</option>
		<option name="phone-medium" value="/img/phone-medium.png">Phone-medium (40x40)</option>
		<option name="phone-small" value="/img/phone-small.png">Phone-small (30x30)</option>
		<option name="video-large" value="/img/video.png">Video-large (50x50)</option>
		<option name="video-medium" value="/img/video-medium.png">Video-medium (40x40)</option>
		<option name="video-small" value="/img/video-small.png">Video-small (30x30)</option>
		<option name="mail-large" value="/img/mail.png">Mail-large (50x50)</option>
		<option name="mail-medium" value="/img/mail-medium.png">Mail-medium (40x40)</option>
		<option name="mail-small" value="/img/mail-small.png">Mail-small (30x30)</option>
		<option name="whatsapp-large" value="/img/whatsapp.png">Whatsapp-large (50x50)</option>
		<option name="whatsapp-medium" value="/img/whatsapp-medium.png">Whatsapp-medium (40x40)</option>
		<option name="whtasapp-small" value="/img/whatsapp-small.png">Whatsapp-small (30x30)</option>
		</select>'
		);
		}
    }

	
	public function myfixed_element9_content_bg_color_callback()
    {
        printf(
            '<p class="description"><input type="text" size="8" id="myfixed_element_content_bg_color" name="livechat_2connectme_elements_options9[myfixed_element_content_bg_color]" value="%s" class="my-color-field" /></p>',
            isset( $this->options9['myfixed_element_content_bg_color'] ) ? esc_attr( $this->options9['myfixed_element_content_bg_color']) : '' 
        );
    }
	public function myfixed_element9_content_txt_color_callback()
    {
        printf(
            '<p class="description"><input type="text" size="8" id="myfixed_element_content_txt_color" name="livechat_2connectme_elements_options9[myfixed_element_content_txt_color]" value="%s" class="my-color-field" /></p>',
            isset( $this->options9['myfixed_element_content_txt_color'] ) ? esc_attr( $this->options9['myfixed_element_content_txt_color']) : '' 
        );
    }


	public function myfixed_element9_content_height_callback()
    {
        printf(
            '<p class="description"><input type="text" size="4" id="myfixed_element_content_height" name="livechat_2connectme_elements_options9[myfixed_element_content_height]" value="%s" />px</p>',
            isset( $this->options9['myfixed_element_content_height'] ) ? esc_attr( $this->options9['myfixed_element_content_height']) : '' 
        );
    }
	
	
	public function myfixed_element9_content_callback()
	{
		 if (isset( $this->options9['myfixed_element_content']) && $this->options9['myfixed_element_content'] != "" ){
			printf(
				'<textarea type="textarea" rows="3" style="width:500px;" id="myfixed_element_content" name="livechat_2connectme_elements_options9[myfixed_element_content]" />%s</textarea>', esc_attr($this->options9['myfixed_element_content'])
			);
		 }
		 else{
			printf(
				'<textarea type="textarea" rows="8" style="width:500px;" id="myfixed_element_content" name="livechat_2connectme_elements_options9[myfixed_element_content]" />%s</textarea>', '');
		 }
		
	 }


} /* livechat2connectmeelementsPage */

	
	function insert_my_footerrr_2connectme() {
		
	}
	
	function livechat2connectmeelements_script() {
		
		if( wp_script_is( 'jquery' ) ) {
		// do nothing
		} else {
		wp_enqueue_script( 'jquery' );
		}

		// development
		//wp_register_script('livechat2connectmeelements', plugins_url('js/livechat2connectmeelements.js', __FILE__), false,'1.0.0', true);		

		//production
		wp_register_script('livechat2connectmeelements', plugins_url('js/livechat2connectmeelements.min.js', __FILE__), false,'1.0.0', true);
		
		wp_enqueue_script( 'livechat2connectmeelements');		

		$livechat2connectme_options9 = get_option( 'livechat_2connectme_elements_options9' );
				
		$livechat2connectme_translation_array = array( 		
		    'myfixed_click_string' => $livechat2connectme_options9 ['myfixed_click'] ,
			'livechat2connectme_disable_at_width_string' => $livechat2connectme_options9 ['myfixed_disable_small_screen'],
			'myfixed_element_enable' => $livechat2connectme_options9 ['myfixed_element_enable'], 
			'myfixed_element_side_position' => $livechat2connectme_options9 ['myfixed_element_side_position'],
			'myfixed_element_content_width' => $livechat2connectme_options9 ['myfixed_element_content_width'],
			'myfixed_element_content_bg_color' => $livechat2connectme_options9 ['myfixed_element_content_bg_color'],
			'myfixed_element_icon_bg_color' => $livechat2connectme_options9 ['myfixed_element_icon_bg_color'],
			'myfixed_element_icon_bg_img' => $livechat2connectme_options9 ['myfixed_element_icon_bg_img'],
			'myfixed_element_content_txt_color' => $livechat2connectme_options9 ['myfixed_element_content_txt_color'],
			'myfixed_element_content_padding' => $livechat2connectme_options9 ['myfixed_element_content_padding'],
			'myfixed_element_content' => $livechat2connectme_options9 ['myfixed_element_content'] ,
			'myfixed_element_content_height' => $livechat2connectme_options9 ['myfixed_element_content_height'],			
		);
		
		wp_localize_script( 'livechat2connectmeelements', 'livechat2connectme_element', $livechat2connectme_translation_array );
	}

	if( is_admin() )
		$my_settings_page = new livechat2connectmeelementsPage();

	add_action('wp_footer', 'insert_my_footerrr_2connectme');
	add_action('wp_enqueue_scripts', 'livechat2connectmeelements_script' );

?>