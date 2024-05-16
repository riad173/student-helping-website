<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.png" type="image/x.icon">
    <title>StudentHelping.com</title>

    <link rel="stylesheet" href="style.css">

</head>
<body onload="initClock()">
    <div class ="container">
    <div class ="clock">

      <div class="circle" id="sc" style="--clr:#04fc43;"><i></i></div>
      <div class="circle circle2" id="mn" style="--clr:#fee800;"><i></i></div>
      <div class="circle circle3" id="hr" style="--clr:#ff2972;"><i></i></div>

      <span style = "--i:1;"><b>1</b></span>
      <span style = "--i:2;"><b>2</b></span>
      <span style = "--i:3;"><b>3</b></span>
      <span style = "--i:4;"><b>4</b></span>
      <span style = "--i:5;"><b>5</b></span>
      <span style = "--i:6;"><b>6</b></span>
      <span style = "--i:7;"><b>7</b></span>
      <span style = "--i:8;"><b>8</b></span>
      <span style = "--i:9;"><b>9</b></span>
      <span style = "--i:10;"><b>10</b></span>
      <span style = "--i:11;"><b>11</b></span>
      <span style = "--i:12;"><b>12</b></span>

    </div>
  
    <div  id = "ytime">

      <div id = "yhours" style="--clr:#ff2972;">00</div>
      <div id = "yminutes" style="--clr:#fee800;">00</div>
      <div id = "yseconds" style="--clr:#04fc43;">00</div>
      <div id = "yampm">AM</div>

    </div>


    
  </div>


    <div class="alarm">

        <div class="datetime">
            <div class="date">
                <div id="alarmclock" >ALARM CLOCK</div>
                <span id="dayName">Day</span>,
                <span id="month">Month</span>,
                <span id="dayNum">00</span>,
                <span id="year">Year</span>
            </div>
            <div class="time">
                <span id="hour">00</span>:
                <span id="minutes">00</span>:
                <span id="seconds">00</span>:
                <span id="period">AM</span>
            </div>
            <button id="stopAlarm" onclick="stopAlarm()">Stop Alarm</button>
        </div>

        <hr>

        <div class="setAlarm">

            <div class="column">
                <select>
                    <option value="setHour" selected hidden>Hour</option>
                </select>
            </div>

            <div class="column">
                <select>
                    <option value="setMinute" selected hidden>Minute</option>
                    
                </select>
            </div>

            <div class="column">
                <select>
                    <option value="setSeconds" selected hidden>Seconds</option>
                    
                </select>
            </div>

            <div class="column">
                <select>
                    <option value="AM/PM" selected hidden>AM/PM</option>
                </select>
            </div>

            <button id="btn-setAlarm" type="submit">Set Alarm</button>
            
        </div>

        <hr>

        <h3 id="alarm-h3"></h3>

        <div class="alarmList"></div>
  
    </div>

    <div  id = "ytime">

      <a style="text-decoration: none; color:#fff;" href="./stopwatch/stopwatch.php">Stop Watch</a>

    </div>
    <script src="script.js"></script>
</body>
</html>