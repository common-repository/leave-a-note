<?php 

function charAt($str, $pos){
	return (substr($str, $pos, 1));
} 

function is_hex($entry){
	$validChar=array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');// characters allowed in hex
	$stringlen=strlen($entry);
	$entry=strtoupper($entry);   // lowercase characters? make uppercase
								// Now scan string for illegal characters
	if ($stringlen < 6){
		return false;
	} else {
		for ($i=0;$i<$stringlen;$i++){
    		if(!in_array(charAt($entry,$i),$validChar)){        
       			return false;
			}
    	} 
		return true;
	}
}

		if($_POST['leaveanote_hidden'] == 'Y') {
			$leaveanote_name = $_POST['leaveanote_name'];
			update_option('leaveanote_name', $leaveanote_name);
			
			$leaveanote_date = $_POST['leaveanote_date'];
			update_option('leaveanote_date', $leaveanote_date);
			
			$leaveanote_char = $_POST['leaveanote_char'];
			update_option('leaveanote_char', $leaveanote_char);
			
			$leaveanote_height = $_POST['leaveanote_height'];
			update_option('leaveanote_height', $leaveanote_height);
			
			$leaveanote_width = $_POST['leaveanote_width'];
			update_option('leaveanote_width', $leaveanote_width);
			
			$leaveanote_background = $_POST['leaveanote_background'];
			if ($leaveanote_background == false){
				update_option('leaveanote_background', $leaveanote_background);
			} else {
				if (is_hex($leaveanote_background)){
					update_option('leaveanote_background', $leaveanote_background);
				} else {
					$leaveanote_background = 'FFFF99';
					update_option('leaveanote_background', $leaveanote_background);
				}
			}

			$leaveanote_showhide = $_POST['leaveanote_showhide'];
			update_option('leaveanote_showhide', $leaveanote_showhide);	
			
			$leaveanote_css = $_POST['leaveanote_css'];
			update_option('leaveanote_css', $leaveanote_css);
			
			$leaveanote_excerpt = $_POST['leaveanote_excerpt'];
			update_option('leaveanote_excerpt', $leaveanote_excerpt);
			
			print '<div class="updated"><p><strong>Settings saved.</strong></p></div>';
		} else {
			//Normal page display
			$leaveanote_name = get_option('leaveanote_name');
			$leaveanote_date = get_option('leaveanote_date');
			$leaveanote_char = get_option('leaveanote_char');
			$leaveanote_height = get_option('leaveanote_height');
			$leaveanote_width = get_option('leaveanote_width');
			$leaveanote_background = get_option('leaveanote_background');
			$leaveanote_showhide = get_option('leaveanote_showhide');
			if ($leaveanote_showhide != 'show' && $leaveanote_showhide != 'hide') {
				$leaveanote_showhide = 'show';
				update_option('leaveanote_showhide', $leaveanote_showhide);
			}
			$leaveanote_css = get_option('leaveanote_css');
			$leaveanote_excerpt = get_option('leaveanote_excerpt');
		}
		
		if ($leaveanote_name){
			$checked_name = 'checked="checked"';
		} else {
			$checked_name = '';
		}
		if ($leaveanote_date){
			$checked_date = 'checked="checked"';
		} else {
			$checked_date = '';
		}
		if ($leaveanote_css){
			$checked_css = 'checked="checked"';
		} else {
			$checked_css = '';
		}
		
?>


<div class="wrap">
	<h2>Leave-a-Note Visual Commenting Options</h2>		
	<form name="leaveanote_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="leaveanote_hidden" value="Y">
        <h3>Display Settings</h3>
        <p><input type="text" name="leaveanote_height" id="leaveanote_height" value="<?php echo $leaveanote_height; ?>" size="10" maxlength="10"> <label for="leaveanote_height">Note Height <em>(in pixels)</em></label></p>
        <p><input type="text" name="leaveanote_width" id="leaveanote_width" value="<?php echo $leaveanote_width; ?>" size="10" maxlength="10"> <label for="leaveanote_width">Note Width <em>(in pixels)</em></label></p>
        <p><input type="text" name="leaveanote_background" id="leaveanote_background" value="<?php echo $leaveanote_background; ?>" size="10" maxlength="6"> <label for="leaveanote_background">Background Color <em>(6 digit hexidecimal value)</em></label></p>
        <p><input type="checkbox" name="leaveanote_css" id="leaveanote_css" value="1" <?php echo $checked_css; ?>> <label for="leaveanote_css">Use custom CSS style sheet <em>(for advanced users only)</em></label></p>
        <h3>Default Behavior on Page Load</h3>
        <p><input type="radio" name="leaveanote_showhide" id="showhide_show" value="show" <?php if ($leaveanote_showhide == 'show') {echo 'checked'; }?>> <label for="showhide_show">Show comments</label></p>
        <p><input type="radio" name="leaveanote_showhide" id="showhide_hide" value="hide" <?php if ($leaveanote_showhide == 'hide') {echo 'checked'; }?>> <label for="showhide_hide">Hide comments</label></p>
		<p class="submit"><input type="submit" name="Submit" value="Save Settings" /></p>
	</form>
</div>