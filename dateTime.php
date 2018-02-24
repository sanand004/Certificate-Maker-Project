<!--Add
 <body onload="startTime()">
 this line in every page to before add this file -->
<?php
$date=date('d M Y');

$time=date('l', strtotime($date));
?>

 <div style="padding-right:2%;padding-top:1%; color:#009;float:right">
 <div id="txt" style="display:inline""></div>
<!--<img src="images/calicon.png" width="2.5%">-->
<?php echo '&nbsp;'.$time.'&nbsp;'.$date ?>

</div>

<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
	
	/*
	var h = (h+24-2)%24; 
    var mid='am';
    if(h==0){ //At 00 hours we need to show 12 am
    h=12;
    }
    else if(h>12)
    {
    h=h%12;
    mid='pm';
    }
	*/
var mid = h >= 12 ? 'pm' : 'am';
  h = h % 12;
  h = h ? h : 12; // the hour '0' should be '12'
	
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
   // document.getElementById('txt').innerHTML =
    //h + ":" + m + ":" + s + mid;
    document.getElementById('txt').innerHTML =
    h + ":" + m + mid;
    
	var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
