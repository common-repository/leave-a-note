jQuery(document).ready(function($){
	var adminChecked = $('#leaveanote_css');
	var adminHeight = $('#leaveanote_height');
	var adminWidth = $('#leaveanote_width');
	var adminBackground = $('#leaveanote_background');
	function leaveanoteCheckChecked(){
		if ($('input[name=leaveanote_css]').is(':checked')) {
			adminHeight.attr("disabled", "disabled");
			adminWidth.attr("disabled", "disabled");
			adminBackground.attr("disabled", "disabled");
		} else {
			adminHeight.removeAttr("disabled");
			adminWidth.removeAttr("disabled");
			adminBackground.removeAttr("disabled");
		}
	}
	
	leaveanoteCheckChecked();
	
	adminChecked.click(function(){
		leaveanoteCheckChecked();
	});
});