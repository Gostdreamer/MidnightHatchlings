<?php //no direct access
defined('_JEXEC') or die ('Restricted access');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
	<?php
		function getImagesFromDir($path) {
  			$images = array();
	  		if ( $img_dir = @opendir($path) ) {
	      		while ( false !== ($img_file = readdir($img_dir)) ) {
		        	// checks for gif, jpg, png
			        if ( preg_match("/(\.gif|\.jpg|\.png)$/", $img_file) ) {
			              $images[] = $img_file;
			        }
		      	}
	      	closedir($img_dir);
		  	}
	  		return $images;
		}

		function getRandomFromArray($ar) {
		  	$num = array_rand($ar);
		  	return $ar[$num];
		}

	$root = $_SERVER['DOCUMENT_ROOT'];
	$path = '/images/critters/eggs/';
	// Obtain list of images from directory 
	$imgList = getImagesFromDir($root . $path);
	?>
<script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="/js/jquery.cycle.all.js"></script>

<script type="text/javascript">

$(function(){
    $('.slideshow3').on('click', function(e){
        e.preventDefault(); // stops the link doing what it normally 
                            // would do which is jump to page top with href="#"
        //showFilm($(this).data('filmid'));
        alert ("3");
    });
});
	
function pickupEgg($src){
$data = $src;
window.location="http://192.168.1.75/catchpage";
}

function XMLpickupEgg1(){
var request = new XMLHttpRequest();
  request.open('GET', '', false);
  request.send();
  if (request.status === 200) {
    alert(request.responseText);
  window.location="http://192.168.1.75/catchpage";

  }
}

function XMLpickupEgg2(callback) {
    var data;
    $.ajax({
        url: '/catchpage',
        data: 'testing',
        success: function (resp) {
            data = resp;
            callback(data);
        },
        error: function () {}
    }); // ajax asynchronus request 
    //the following line wouldn't work, since the function returns immediately
    //return data; // return data from the ajax request
}

//Function to handle ajax.
function sendValue(str){
    
    // post(file, data, callback, type); (only "file" is required)
    $.post(
        
    "ajax.php", //Ajax file
    
    { sendValue: str },  // create an object will all values
    
    //function that is called when server returns a value.
    function(data){
        $('#display').html(data.returnValue);
    }, 
    
    //How you want the data formated when it is returned from the server.
    "json"
    );
    
}

$(document).ready(function(){
    
    // When the user finishes typing 
    // a character in the text box...
    $('#txtValue').keyup(function(){
        
        // Call the function to handle the AJAX.
        // Pass the value of the text box to the function.
        sendValue($(this).val());   
        
    }); 
    
});

$(document).ready(function(){
	$('.slideshow1').cycle({ 
		fx: 'fadeZoom',
		random: 1,
		speed: 1500,
		timeout: 4000,
		delay: -1,
	});
	
	$('.slideshow2').cycle({
		fx: 'fadeZoom',
		random: 1,
		speed: 1000,
		timeout: 3000,
		delay: 1,
	});
	
	$('.slideshow3').cycle({
		fx: 'fadeZoom',
		random: 1,
		speed: 1500,
		timeout: 2000,
		delay: 2,
	});
	
	$('.slideshow4').cycle({
		fx: 'fadeZoom',
		random: 1,
		speed: 1500,
		timeout: 5000,
		delay: 2,
	});
	
	$('.slideshow5').cycle({
		fx: 'fadeZoom',
		random: 1,
		speed: 1500,
		timeout: 2000,
		delay: 1,
	});
	
	$('.slideshow6').cycle({
		fx: 'fadeZoom',
		random: 1,
		speed: 1500,
		timeout: 4000,
		delay: 3,
	});
	
	$('.slideshow7').cycle({
		fx: 'fadeZoom',
		random: 1,
		speed: 1500,
		timeout: 3000,
		delay: 2,
	});
	
	$('.slideshow8').cycle({
		fx: 'fadeZoom',
		random: 1,
		speed: 1500,
		timeout: 4000,
		delay: 4,
	});
	
	$('.slideshow9').cycle({
		fx: 'fadeZoom',
		random: 1,
		speed: 1500,
		timeout: 5000,
		delay: 2,
	});
	
	$('.slideshow10').cycle({
		fx: 'fadeZoom',
		random: 1,
		speed: 1500,
		timeout: 1000,
		delay: 1, 
	});
});
</script>
	</head>
    <body>
    	<div class="forest2" style="position: relative">
			<img src="/images/forest.jpg">
		    
		    <div class="slideshow1" style="position: absolute; top: 315px; left: 24px;" >
	  	    	<?php
			    	foreach ( $imgList as $img ):
			     	$img = getRandomFromArray ( $imgList );
	     		?>
				<img src="<?php echo $path .$img ?>" onClick="pickupEgg(this.value);" width="27" height="27"/>
	  	    	<?php endforeach; ?>
    		</div>

			<div class="slideshow2" style="position: absolute; top: 84px; left: 66px;" >
				<?php
					foreach ( $imgList as $img ) :
					$img = getRandomFromArray ( $imgList );
				?>
				<img src="<?php echo $path . $img ?>" onClick="XMLpickupEgg2();" width="27" height="27" />
				<?php endforeach; ?> 
			</div>
			
			<div class="slideshow3" style="position: absolute; top: 325px; left: 181px;" >
				<?php
					foreach ( $imgList as $img ) :
					$img = getRandomFromArray ( $imgList );
				?>
				<img src="<?php echo $path . $img ?>" onClick="basket();" width="27" height="27" />
				<?php endforeach; ?> 
			</div>
				
			<div class="slideshow4" style="position: absolute; top: 28px; left: 248px;" >
				<?php
					foreach ( $imgList as $img ) :
					$img = getRandomFromArray ( $imgList );
				?>
				<img src="<?php echo $path . $img ?>" width="27" height="27" />
				<?php endforeach; ?>
			</div>
				
			<div class="slideshow5" style="position: absolute; top: 331px; left: 326px;" >
				<?php
					foreach ( $imgList as $img ) :
					$img = getRandomFromArray ( $imgList );
				?>
				<img src="<?php echo $path . $img ?>" width="27" height="27" />
				<?php endforeach; ?>
			</div>
				
			<div class="slideshow6" style="position: absolute; top: 325px; left: 487px;" >
				<?php
					foreach ( $imgList as $img ) :
					$img = getRandomFromArray ( $imgList );
				?>
				<img src="<?php echo $path . $img ?>" width="27" height="27" />
				<?php endforeach; ?>
			</div>
				
			<div class="slideshow7" style="position: absolute; top: 28px; left: 638px;" >
				<?php
					foreach ( $imgList as $img ) :
					$img = getRandomFromArray ( $imgList );
				?>
				<img src="<?php echo $path . $img ?>" width="27" height="27" />
				<?php endforeach; ?>
			</div>
				
			<div class="slideshow8" style="position: absolute; top: 335px; left: 655px;" >
				<?php
					foreach ( $imgList as $img ) :
					$img = getRandomFromArray ( $imgList );
				?>
				<img src="<?php echo $path . $img ?>" width="27" height="27" />
				<?php endforeach; ?>
			</div>
				
			<div class="slideshow9" style="position: absolute; top: 68px; left: 769px;" >
				<?php
					foreach ( $imgList as $img ) :
					$img = getRandomFromArray ( $imgList );
				?>
				<img src="<?php echo $path . $img ?>" width="27" height="27" />
				<?php endforeach; ?>
			</div>
				
			<div class="slideshow10" style="position: absolute; top: 315px; left: 826px;" >
				<?php
					foreach ( $imgList as $img ) :
					$img = getRandomFromArray ( $imgList );
				?>
				<img src="<?php echo $path . $img ?>" width="27" height="27" />
				<?php endforeach; ?>
			</div>
		</div>
		<label for="txtValue">Enter a value : </label>
    <input type="text" name="txtValue" value="" id="txtValue">
    
    <div id="display"></div>
   </body>
</html>
