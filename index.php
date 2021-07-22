<?php
$file = 'counter.txt';
// CREATE FILE
if(!file_exists($file)){
    $create = fopen($file, 'w') or die("Could not create the counter database.");
    file_put_contents( $file , '0' );
    fclose($create);
}
// WRITE FILE
if( isset($_POST['count']) ){
    $msg = htmlentities(strip_tags($_POST['count']), ENT_QUOTES);
    file_put_contents($file, $msg);
}
?>


<!DOCTYPE html>
<html>

<head>
    
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<meta charset=utf-8 />
<title>Please pet Pigu!</title>
</head>

<style>

    body {
        text-align: center;
    }

    .petButton {
        margin-top: 20px;
    }

    .petButton button:hover { 
        transform: scale(1.10); 
    }


    img {
        user-drag: none; 
        user-select: none;
        -moz-user-select: none;
        -webkit-user-drag: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        text-align: center;
}
</style>

<body>
    <p id="WelcomeMsg">This is Pigu the penguin. He is very lonely. Please pet Pigu.</p>

    <img src="images/cryingCutePenguin.gif" id="sadpenguin" width="256px" height="256px">

<div class="petButton">

    <button onclick="style.display = 'none';thankYouMsg();changeImage()">Pet Me!</button> 


</div>


<br><b></b>

<script>

        function changeImage() {
                document.getElementById('sadpenguin').src="images/happypenguin.gif";



            }

            function thankYouMsg() {
                document.getElementById("WelcomeMsg").innerHTML = 'Pigu is feeling better now that you petted him. Pigu still wants more pets! Please visit soon.' ;


            }

    function addCount( newCounterValue ){
        $.ajax( {
            type: "POST",
            data: {count : newCounterValue},
            cache: false,
                    async: false,
            success: function() {
                $('b').append('<br>Total Pets Received: '+ newCounterValue);
            }
        });
    }
    $(function(){
        $('button').click(function(){       
            $.get('counter.txt', function(data) {
                // READ
                var counter = parseInt(data, 10) || 0;
                // SEND
                addCount( ++counter ); // send preIncremented COUNTER
            });     
        });
    });


</script>

</body>
</html>

	

<div id="c1b2cc32-b250-4ff5-a206-2788bc4fbc94-bottom"></div></body></html>
