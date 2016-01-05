(function($) {
	Drupal.behaviors.custom = {
		attach : function(context, settings) {
			
			$("span.Button").click(function() {				
				$.ajax({
					type : "POST",
					url : "/drupal7/customtest/callback",
					success : function(data) {
						$('#Load-Data').html(data);
						Drupal.attachBehaviors('#Load-Data');
					}
				});
			});
			
			
//			$(document).ajaxComplete(function() {
//                Drupal.attachBehaviors(context);
//			});

			
		}
	}
})(jQuery);