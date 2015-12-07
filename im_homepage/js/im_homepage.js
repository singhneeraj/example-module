/**
 * @file
 * inc file for holiday and sales plan content type.
 */
/**
 * function to check the calender field has same year or not. 
 */
var week_no = 0; //global variable for storing week number in the carousel
var prev_flag = 0; 
(function($) {
  Drupal.behaviors.im_user_sales_plan_holiday = {};
  Drupal.behaviors.im_user_sales_plan_holiday.attach = function(context) {

    $('.content-link').live('click', function(e) {
       if ($(".national-title").length) $('.national-title').removeClass('active-title');
       if ($(".regional-title").length) $('.regional-title').removeClass('active-title');
       if ($(".non-alimentare-title").length) $('.non-alimentare-title').removeClass('active-title');
       $(this).parent().addClass('active-title');
       var url_segments = $(this).attr("href").split('/');
       var nid = url_segments[3];
       var data = "nid=" + nid;
       
       //UATIM-239 [SALES PLAN] Unique URL by Trafic
       var url_path =  window.location.pathname;
       var year_reg = 'now';
       var sp_week = Drupal.settings.current_week;
       var change_week = ("0" + sp_week).slice(-2);;
       var url_val = url_path.split("/");
       if (url_val.length >= 3) {
           year_reg = url_val[2];
         }
       var region_value = $("#edit-sp-nothern-region").val();
       var userDate = getUrlVars()["user_date"];
       userDateString  = '?scrollsales=1';
       if (userDate) {
       	userDateString = userDateString+'&user_date='+userDate;
       }
       window.location.href = "/sales-plan/"+year_reg+"/"+region_value+"/"+change_week+"/"+nid+userDateString;      
    e.preventDefault();
    });
    
  }//behaviour end
})(jQuery);

