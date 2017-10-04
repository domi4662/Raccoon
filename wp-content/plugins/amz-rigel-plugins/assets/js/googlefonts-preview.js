/*
 * jQuery google font preview
 * http://amazee.co
 *
 * Copyright (c) 2015 Shahul Hameed (http://amazee.co)
 * 
 * @version 1.0
 *
 */

 
 String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

!function($) {

	/**
	  * Google Fonts
	  * Dependencies 	 : google.com, jquery
	  * Feature added by : Smartik - http://smartik.ws/
	  * And Changed by 	 : Shahul Hameed - http://pixel8es.com
	  * Date 			 : 03.17.2013
	  */
	function AmzGoogleFontSelect( slctr, mainID ){
		
		var _selected = $(slctr).val();//get current value - selected and saved
		var _linkclass = 'style_link_'+ mainID;
		var _previewer = mainID +'_ggf_previewer';
		
		if( _selected ){ //if var exists and isset

			$('.'+ _previewer ).fadeIn();
			
			//Check if selected is not equal with "Select a font" and execute the script.
			if ( _selected !== 'none' && _selected !== 'Select a font' ) {
				
				//remove other elements crested in <head>
				$( '.'+ _linkclass ).remove();
				
				//replace spaces with "+" sign
				var the_font = _selected.replace(/\s+/g, '+');
				
				//add reference to google font family
				$('head').append('<link href="http://fonts.googleapis.com/css?family='+ the_font +'" rel="stylesheet" type="text/css" class="'+ _linkclass +'">');
				
				//show in the preview box the font
				$('.'+ _previewer ).css('font-family', _selected +', sans-serif' );
				
			}else{
				
				//if selected is not a font remove style "font-family" at preview box
				$('.'+ _previewer ).css('font-family', '' );
				$('.'+ _previewer ).fadeOut();
				
			}
		
		}
	
	}

	jQuery(".amz_google_font_select").select2();

	function AmzSetVal( paramID ){
		var mainID = paramID + '_gfont',
			size = mainID + '_size',
			variants = mainID + '_variants',
			fontStr;

		//fontStr = "{'family':"+ $('#'+mainID).val() +", 'variant':"+ $('#'+variants).val() +", 'size':"+ $('#'+size).val() +"}";

		fontStr = "{";

			var $gf = $('#'+mainID), $i=0;
			if( $gf.length ){
				fontStr += "'family':'"+ $gf.val() +"', ";
			}
			var $gv = $('#'+variants);
			if( $gv.length ){
				fontStr += "'variant':'"+ $gv.val() +"', ";
			}
			var $gs = $('#'+size);
			if( $gs.length ){
				fontStr += "'size':'"+ $gs.val() +"'";
			}

		fontStr += "}";

		fontStr = fontStr.replace(", }", "}")

		$('#'+paramID).val(fontStr);

	}

	//Trigger on change
	function AmzValueChanged() { 
		var paramID = jQuery(this).parent('div').data( 'paramid' );
		AmzSetVal( paramID );
	}
	
	//init for each element
	jQuery( '.amz_google_font_select' ).each(function(){ 
		var mainID = jQuery(this).attr('id');
		AmzGoogleFontSelect( this, mainID );
	});
	
	//init when value is changed
	jQuery( '.amz_google_font_select' ).change(function(){ 
		var mainID = jQuery(this).attr('id'), val = $(this).val(), $styleSelect = $('#'+mainID+'_variants'), newOption = '';
		AmzGoogleFontSelect( this, mainID );

		var paramID = $(this).parent('div').data( 'paramid' );
		AmzSetVal( paramID );

		if ( val != 'none' &&  val != '' ) {

			//Change font variant on change
			$.ajax({
				type: 'post',
				url: ajaxurl,
				data: {
					action: 'amz_change_gfont_weight',
					font: val
				},
				beforeSend: function()
				{
					$styleSelect.html('<option value="regular">Loading...</option>').trigger('change');
				},
			})
			.done(function(res) {
				res = $.parseJSON(res);
				if(res != 'regular'){
					for( i in res){
						newOption += '<option value="'+ res[i] +'">'+ res[i].capitalize() +'</option>';
						if(i == ( res.length - 1 )){
							break;
						}
					}
					$styleSelect.html(newOption).trigger('change');
					newOption = '';
				}else{
					$styleSelect.html('<option value="regular">Regular</option>').trigger('change');
					//AmzSetVal( paramID );
				}
				
			})
			.fail(function() {
				alert('Font Style not loaded, Please refresh your page and try again!');
			});
		} else {
			$styleSelect.html('<option value="none">Theme Default</option>').trigger('change');
		}

	});
	
	jQuery( '.amz_google_font_size_select' ).on('change', AmzValueChanged);

	jQuery( '.amz_google_font_variants_select' ).on('change', AmzValueChanged);
	
}(window.jQuery);

