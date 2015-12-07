<div id="page">
  <div id="home-wrap">
    <div class="home-left">L</div>
    <div class="home-right">
      <div id="weather-wrap">
        <div class="current-climate">
        <div class="weather-icon-day"><img src= "<?php print drupal_get_path('module', 'im_homepage')?>/css/images/current.png"></div>
           <div class="temp-value">22</div>
           <div class="temp-category">°C</div>
           <div class="weather-city">LYON</div>
           <div class="day-info">St Romain</div>
        </div>
        <!----- CLIMATE----- -->
        <div class="weather-future-days">
          <div class="future-day">
             <div class="day">vendredi</div>
             <div class="weather-icon"><img src="<?php print drupal_get_path('module', 'im_homepage')?>/css/images/1.png"/></div>
             <div class="temp-max">15°</div>
             <div class="temp-min">1°</div>
          </div>
        </div>
      </div>
      <!----- Message Slideshow----- -->
      <div id="message-wrap">

      </div>
      <!----- LINK BUTTONS----- -->
      <div class="right-bottom">
        <div id="two-box">
        <?php
         $guide_block = module_invoke("im_homepage",'block_view', "guide_info");
         print render($guide_block['content']);
         $traffic_block = module_invoke("im_homepage",'block_view', "traffic_info");
         print render($traffic_block['content']);
         ?>
        </div>
      
      
      <!----- TODO SECTION----- -->
        <div id="todo-sec">
          <div class="tabtog-links">
            <a href="#" class="link-toggle">To do liste</a>
            <span>
              <a href="#">Voir toutes les tâches</a>
              <a href="#">Voir le reste à réaliser</a>
            </span>
          </div>
          <div id="date-sorter">
            <div class="unprocessed-box"><h4>4</h4> a realiser</div>
            <div class="view-type-tab">
              <a href="#">Vue jour</a>
              <a href="#">Vue semaine</a>
            </div>
            <div class="calander-dates">Mer 21.08</div>
            <div class="calander-line"></div>
            <div class="unprocessed-box"><h4>4</h4> a realiser</div>
          </div>
        
        </div>
      </div>
      
    </div>
  </div>
</div>