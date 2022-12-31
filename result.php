<?php
session_start();
?>

 
<html> 
<head> 
  <style>
    body{ 
    text-align: center; 
    background: #ffffff; 
    font-family: sans-serif; 
    font-weight: 100; 
  
} 
h1{ 
  color: #000000; 
  font-weight: 100; 
  font-size: 40px; 
  margin: 40px 0px 20px; 
  
} 
 #clockdiv{ 
    font-family: sans-serif; 
    color: #000000; 
    display: inline-block; 
    font-weight: 100; 
    text-align: center; 
    border: 16px solid red;
    padding: 40px;
    margin-bottom: 60px;
    font-size: 30px; 
} 
#clockdiv > div{ 
    padding: 10px; 
    border-radius: 3px; 
    background: #fe6f5e; 
    display: inline-block; 
} 
#clockdiv div > span{ 
    padding: 15px; 
    border-radius: 3px; 
    background: #ed1c24; 
    display: inline-block; 
} 
smalltext{ 
    padding-top: 5px; 
    font-size: 16px; 
} 

  
  
  </style>
</head> 
<body> 
<h1>Voting Ends In...</h1> 
<div id="clockdiv"> 
  <div> 
    <span class="days" id="day"></span> 
    <div class="smalltext">Days</div> 
  </div> 
  <div> 
    <span class="hours" id="hour"></span> 
    <div class="smalltext">Hours</div> 
  </div> 
  <div> 
    <span class="minutes" id="minute"></span> 
    <div class="smalltext">Minutes</div> 
  </div> 
  <div> 
    <span class="seconds" id="second"></span> 
    <div class="smalltext">Seconds</div> 
  </div> 
</div> 
  
<p font-size=7 id="demo"></p>
<?php $days= $_SESSION["days"];?> 
  
<script>
  var days = "<?php echo $days; ?>";
  var deadline = new Date(days).getTime(); 
  
var x = setInterval(function() { 
  
var now = new Date().getTime(); 
var t = deadline - now; 
var days = Math.floor(t / (1000*60*60*24)); 
var hours = Math.floor((t%(1000*60*60*24))/(1000 * 60 * 60)); 
var minutes = Math.floor((t%(1000*60*60)) / (1000 * 60)); 
var seconds = Math.floor((t%(1000*60)) / 1000); 
document.getElementById("day").innerHTML =days ; 
document.getElementById("hour").innerHTML =hours; 
document.getElementById("minute").innerHTML = minutes;  
document.getElementById("second").innerHTML =seconds;  
if (t < 0) { 
        clearInterval(x); 
        document.getElementById("demo").innerHTML = "VOTE NOW!!"; 
        document.getElementById("day").innerHTML ='0'; 
        document.getElementById("hour").innerHTML ='0'; 
        document.getElementById("minute").innerHTML ='0' ;  
        document.getElementById("second").innerHTML = '0';
        window.location.href = 'resultpage.php'; } 
}, 1000); 
</script>
</body> 
</html> 

