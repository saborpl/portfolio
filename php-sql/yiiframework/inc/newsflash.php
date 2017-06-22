<script type="text/javascript">
 $(document).ready( function(){	
		var buttons = { previous:$('#jslidernews2 .button-previous') ,
						next:$('#jslidernews2 .button-next') };			 
		$('#jslidernews2').lofJSidernews( { interval:10000,
											 	easing:'easeInOutQuad',
												duration:1200,
												auto:true,
												mainWidth:914,
												mainHeight:300,
												navigatorHeight		: 100,
												navigatorWidth		: 310,
												maxItemDisplay:3,
												buttons:buttons } );						
	});

</script>
<style>
	
	ul.lof-main-wapper li {
		position:relative;	
	}
</style>

<div id="jslidernews2" class="lof-slidecontent" style="width:890px; height:300px;">
<div class="preload"><div></div></div>
<div  class="button-previous">Previous</div>
                   
<!-- MAIN CONTENT --> 
<div class="main-slider-content" style="width:614px; height:300px;">
<ul class="sliders-wrap-inner">

        <li>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/slideshow/01.jpg" alt="1" width="960" height="300" />
        <div class="slider-description">
        <span class="nf_tytul">saddasdasdsa</span>
        <br />
		<span class="nf_tekst">dssaddsa</span>
        <a class="readmore" href="?it=72&id={$fnews.id}">Czytaj więcej </a>
        </div>
        </li> 

        <li>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/slideshow/02.jpg" alt="1" width="960" height="300" />
        <div class="slider-description">
        <span class="nf_tytul">saddasdasdsa</span>
        <br />
		<span class="nf_tekst">dssaddsa</span>
        <a class="readmore" href="?it=72&id={$fnews.id}">Czytaj więcej </a>
        </div>
        </li> 

        <li>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/slideshow/03.jpg" alt="1" width="960" height="300" />
        <div class="slider-description">
        <span class="nf_tytul">saddasdasdsa</span>
        <br />
		<span class="nf_tekst">dssaddsa</span>
        <a class="readmore" href="?it=72&id={$fnews.id}">Czytaj więcej </a>
        </div>
        </li> 

        <li>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/slideshow/04.jpg" alt="1" width="960" height="300" />
        <div class="slider-description">
        <span class="nf_tytul">saddasdasdsa</span>
        <br />
		<span class="nf_tekst">dssaddsa</span>
        <a class="readmore" href="?it=72&id={$fnews.id}">Czytaj więcej </a>
        </div>
        </li> 

</ul>  	
</div>
<!-- END MAIN CONTENT --> 


<!-- NAVIGATOR -->
<div class="navigator-content">
<div class="navigator-wrapper">
<ul class="navigator-wrap-inner">

      <li>
      <div>
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/slideshow/01.jpg" alt="1" width="100" height="100" />
      <br />
		<span class="nf_navi_tytul">fdsfdfsd</span>
      <br />
		<span class="nf_navi_tekst">dsfdfsdsf</span>
      </div>    
      </li>

      <li>
      <div>
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/slideshow/02.jpg" alt="1" width="100" height="100" />
      <br />
		<span class="nf_navi_tytul">fdsfdfsd</span>
      <br />
		<span class="nf_navi_tekst">dsfdfsdsf</span>
      </div>    
      </li>

      <li>
      <div>
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/slideshow/03.jpg" alt="1" width="100" height="100" />
      <br />
		<span class="nf_navi_tytul">fdsfdfsd</span>
      <br />
		<span class="nf_navi_tekst">dsfdfsdsf</span>
      </div>    
      </li>

      <li>
      <div>
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/slideshow/04.jpg" alt="1" width="100" height="100" />
      <br />
		<span class="nf_navi_tytul">fdsfdfsd</span>
      <br />
		<span class="nf_navi_tekst">dsfdfsdsf</span>
      </div>    
      </li>
</ul>
</div>
</div> 
<!-- END OF NAVIGATOR --->
<div class="button-next">Next</div> 
<!-- BUTTON PLAY-STOP -->
<div class="button-control"><span></span></div>
<!-- END OF BUTTON PLAY-STOP -->           
 </div> 
<!--END OF THE CONTENT --->