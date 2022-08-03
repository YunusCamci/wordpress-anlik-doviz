<?php
/*
Plugin Name: Anlık Döviz Verileri
Plugin URI: https://github.com/YunusCamci/wordpress-anlik-doviz
Description: Anlık Döviz Verilerini Widget Olarak Eklemenizi Sağlar.
Version: 1.0
Author: Yunus
Author URI: https://github.com/YunusCamci
License: GNU
*/

class wpb_widget extends WP_Widget {

	function __construct() {
		parent::__construct(	 
		// Widget Temel ID
			'wpb_widget', 

		// Widget Adı
			__('Döviz Verileri', 'wpb_widget_domain'), 

		// Widget Açıklama
			array( 'description' => __( 'Güncel Döviz Verileri.', 'wpb_widget_domain' ), )
		);
	}


	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', 'Döviz Kurları' );
		echo $args['before_widget'];
		echo $args['before_title'] . $title . $args['after_title'];

		$veriseti = json_decode(file_get_contents('https://finans.truncgil.com/today.json'), true);

		$veriler = array(	
			'Kurlar' => array(
				'USD' => array(
					'ISIM'   => "USD",
					'ALIS'   => $veriseti['USD']['Alış'],
					'SATIS'   => $veriseti['USD']['Satış'],
					'DEGISIM'   => $veriseti['USD']['Değişim']			
				),
				'EUR' => array(
					'ISIM'   => "Euro",
					'ALIS'   => $veriseti['EUR']['Alış'],
					'SATIS'   => $veriseti['EUR']['Satış'],
					'DEGISIM'   => $veriseti['EUR']['Değişim']			
				),
				'GBP' => array(
					'ISIM'   => "İngiliz Sterlini",
					'ALIS'   => $veriseti['GBP']['Alış'],
					'SATIS'   => $veriseti['GBP']['Satış'],
					'DEGISIM'   => $veriseti['GBP']['Değişim']			
				),
			),
			'Altin' => array(
				'GRAM' => array(
					'ISIM'   => "Gram Altın",
					'ALIS'   => $veriseti['gram-altin']['Alış'],
					'SATIS'   => $veriseti['gram-altin']['Satış'],
					'DEGISIM'   => $veriseti['gram-altin']['Değişim']				
				),
				'CEYREK' => array(
					'ISIM'   => "Çeyrek Altın",
					'ALIS'   => $veriseti['ceyrek-altin']['Alış'],
					'SATIS'   => $veriseti['ceyrek-altin']['Satış'],
					'DEGISIM'   => $veriseti['ceyrek-altin']['Değişim']				
				),
				'YARIM' => array(
					'ISIM'   => "Yarım Altın",
					'ALIS'   => $veriseti['yarim-altin']['Alış'],
					'SATIS'   => $veriseti['yarim-altin']['Satış'],
					'DEGISIM'   => $veriseti['yarim-altin']['Değişim']				
				),
				'TAM' => array(
					'ISIM'   => "Tam Altın",
					'ALIS'   => $veriseti['tam-altin']['Alış'],
					'SATIS'   => $veriseti['tam-altin']['Satış'],
					'DEGISIM'   => $veriseti['tam-altin']['Değişim']				
				),
				'CUMHURIYET' => array(
					'ISIM'   => "Cumhuriyet Altını",
					'ALIS'   => $veriseti['cumhuriyet-altini']['Alış'],
					'SATIS'   => $veriseti['cumhuriyet-altini']['Satış'],
					'DEGISIM'   => $veriseti['cumhuriyet-altini']['Değişim']				
				)
			)
		);

		$bg_color = "#1151d3"; //#d10014
		$text_color = "#fff";
		
		echo __( '
			<style>
			.doviz_tbl, th, td{ border:0 !important; border-top: 1px solid #e9e9e9 !important; }
			</style>
			<table class="doviz_tbl" style="text-align: center;">
			<thead>
			<tr>
			<th style="text-align:center; background-color: ' . esc_html($bg_color) . '; color: ' . esc_html($text_color) . '; border:0;">Döviz</th>
			<th style="text-align:center; background-color: ' . esc_html($bg_color) . '; color: ' . esc_html($text_color) . '; border:0;">Alış</th>
			<th style="text-align:center; background-color: ' . esc_html($bg_color) . '; color: ' . esc_html($text_color) . '; border:0;">Satış</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td>Dolar</td>
			<td>' . esc_html(mb_substr($veriler["Kurlar"]["USD"]["ALIS"], 0,5)) . ' ₺</td>
			<td>' . esc_html(mb_substr($veriler["Kurlar"]["USD"]["SATIS"], 0,5)) . ' ₺</td>
			</tr>
			<tr>
			<td>Euro</td>
			<td>' . esc_html(mb_substr($veriler["Kurlar"]["EUR"]["ALIS"], 0,5)) . ' ₺</td>
			<td>' . esc_html(mb_substr($veriler["Kurlar"]["EUR"]["SATIS"], 0,5)) . ' ₺</td>
			</tr>
			<tr>
			<td>Sterlin</td>
			<td>' . esc_html(mb_substr($veriler["Kurlar"]["GBP"]["ALIS"], 0,5)) . ' ₺</td>
			<td>' . esc_html(mb_substr($veriler["Kurlar"]["GBP"]["SATIS"], 0,5)) . ' ₺</td>
			</tr>
			</tbody>
			<thead>
			<tr>
			<th style="text-align:center; background-color: ' . esc_html($bg_color) . '; color: ' . esc_html($text_color) . '; border:0;">Altın</th>
			<th style="text-align:center; background-color: ' . esc_html($bg_color) . '; color: ' . esc_html($text_color) . '; border:0;">Alış</th>
			<th style="text-align:center; background-color: ' . esc_html($bg_color) . '; color: ' . esc_html($text_color) . '; border:0;">Satış</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td>Gram</td>
			<td>' . esc_html($veriler["Altin"]["GRAM"]["ALIS"]) . ' ₺</td>
			<td>' . esc_html($veriler["Altin"]["GRAM"]["SATIS"]) . ' ₺</td>
			</tr>
			<tr>
			<td>Çeyrek</td>
			<td>' . esc_html($veriler["Altin"]["CEYREK"]["ALIS"]) . ' ₺</td>
			<td>' . esc_html($veriler["Altin"]["CEYREK"]["SATIS"]) . ' ₺</td>
			</tr>
			<tr>
			<td>Tam</td>
			<td>' . esc_html($veriler["Altin"]["TAM"]["ALIS"]) . ' ₺</td>
			<td>' . esc_html($veriler["Altin"]["TAM"]["SATIS"]) . ' ₺</td>
			</tr>
			<tr>
			<td>Cumhuriyet</td>
			<td>' . esc_html($veriler["Altin"]["CUMHURIYET"]["ALIS"]) . ' ₺</td>
			<td>' . esc_html($veriler["Altin"]["CUMHURIYET"]["SATIS"]) . ' ₺</td>
			</tr>
			</tbody>
			</table>', 'wpb_widget_domain' );
		echo $args['after_widget'];

	}

} 


function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

?>