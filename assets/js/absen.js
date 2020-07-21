var waktu ;
var timerDiv = document.getElementById('timerValue'),
    start = document.getElementById('signin'),
    stop = document.getElementById('signout'),
    t;
var curdate = new Date();
var exp = new Date();
var seconds = 0, minutes = 0, hours = 0;

$( document ).ready(function() {
    $('#signout').hide();
    var $dOut = $('#date'),

    $hOut = $('#hours'),
    $mOut = $('#minutes'),
    $sOut = $('#seconds'),
    $ampmOut = $('#ampm');
    
    if (statusabsen > 0) {
      if (logoutabsen == '') {
        $('#signout').show();
        var tgl = loginabsen.split(' '); 
        var tglabsen = tgl[0];
        var waktuabsen = tgl[1];
        var thn = tglabsen.split('-');
        var tahunabsen = thn[0];
        var bln = parseInt(thn[1]);
        var tglsignin = parseInt(thn[2]);
        var waktu = jamabsen.split(':');
        var jam = parseInt(waktu[0]);
        var menit = parseInt(waktu[1]);
        var detik = parseInt(waktu[2]);
        
        var exp2 = new Date(tahunabsen,bln,tglsignin,jam,menit,detik);
        exp2.setTime(exp2 + 2592000000);
        curdate = new Date(tahunabsen,bln,tglsignin,jam,menit,detik);

        setCookie('absen', curdate, exp2);
        console.log('timerDiv before'+timerDiv);
        timerDiv.textContent = (jam ? (jam > 9 ? jam : "0" + jam) : "00")
      + ":" + (menit ? (menit > 9 ? menit : "0" + menit) : "00")
      + ":" + (detik > 9 ? detik : "0" + detik);

        var timerTime = timerDiv.textContent.replace("%3A", ":");
        
        // console.log('timerTime', timerTime);
        setCookie('time', timerTime + '|' + curdate, exp);
      }
    }

    var absen2 = getCookie('absen');
    // If timer value is saved in the cookie
   // alert(absen2); 
    if( absen2 != null && absen2 != '00:00:00'  ) {
      $("#signin").hide();
      $(".show").show();
      absen('refresh');
    }else{

      update();

      waktu = window.setInterval(update, 1000);

        $("#signin").show();
        $(".show").hide();
        if (logoutabsen != '') {
          $("#signin").hide();
        }
    }


    
    });

    function you_sign(){
        location.reload();
    }

    function getstatuslogin(){
      var stssignin = '';
      var stssignout = '';
      var stsbreak = '';
      var stslunch = '';
      var stsextrabreak = '';
    }

    function absen(status){

      var exp2 = new Date();
      exp2.setTime(exp2 + 2592000000);
      curdate = new Date();
      var format = formatDate(curdate);
      if (status == 'signin') {
        absenDatabase(format,1,status);
      }
      
        $("#signin").hide();
        $(".show").show();
        $(".show").removeClass("d-none");
        window.clearInterval(waktu);
        var absen3 = getCookie('lunch');
        var absen4 = getCookie('break');
        var absen5 = getCookie('extra');
        $('#lunch').show();
        $('#break').show();
        $('#extrabreak').show();
    // If timer value is saved in the cookie
        if(( absen3 != null && absen3 != '00:00:00') || (absen4 != null && absen4 != '00:00:00') || (absen5 != null && absen5 != '00:00:00')){
          var cookieTime = getCookie('time');
          if (absen3 != null && absen3 != '00:00:00') {
            cookieTime = absen3;
            $('#lunch').text("Back from lunch");
          }
          if(absen4 != null && absen4 != '00:00:00'){
            cookieTime = absen4;
            $('#break').text("Back from break");
          }if (absen5 != null && absen5 != '00:00:00') {
            cookieTime = absen5;
            $('#extrabreak').text("Back from extrabreak");
          }
          var savedCookie = cookieTime;
          // var initialSegments = savedCookie.split('|');
          var savedTimer = savedCookie;
          var timerSegments = savedTimer.split(':');
          console.log('fAbsen:: masuk absen : '+savedCookie);
          document.getElementById('timerValue').textContent = savedTimer;

        }else{
          settime(curdate);  

        }
        if (absen3 == "00:00:00") {
          $('#lunch').hide();
        }if(absen4 == "00:00:00"){  
          $('#break').hide();
        }if(absen5 == "00:00:00"){
          $('#extrabreak').hide();
        }

        setCookie('absen', curdate, exp2);
    }

    function formatDate(date) {
      var hours = date.getHours();
      var minutes = date.getMinutes();
      var seconds = date.getSeconds();
      // var ampm = hours >= 12 ? 'pm' : 'am';
      var dates = ('0' + date.getDate()).slice(-2);
      var months = ('0' + (date.getMonth()+1)).slice(-2);
      var years = date.getFullYear();
      hours = hours % 24;
      hours = hours ? hours : 24; // the hour '0' should be '12'
      minutes = minutes < 10 ? '0'+minutes : minutes;
      var strTime = ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2);
      return  years + '-'+ months + "-" + dates + " " + strTime;
    }

    function absenDatabase(signin,status,sts){
      $.ajax({
        type  : "POST",
        url   : base_url + "Employee/absenEmployee",
        data: {
          tanggal_mulai: signin,
          status: status,
          sts:sts
        },
        success: function(response) {
            console.log(response);
            you_sign();
        },
        error: function(response) {
            console.log(response);
        }
      });
    }

    function deleteCookie(cname) {
      var d = new Date(); //Create an date object
        d.setTime(d.getTime() - (1000*60*60*24)); //Set the time to the past. 1000 milliseonds = 1 second
        var expires = "expires=" + d.toGMTString(); //Compose the expirartion date
        window.document.cookie = cname+"="+"; "+expires;//Set the cookie with name and the expiration date

    }

    function lunch(variable){
      var exp2 = new Date();
      exp2.setTime(exp2 + 2592000000);
      var timerTime = timerDiv.textContent.replace("%3A", ":");
      curdate = new Date();
      var format = formatDate(curdate);
      
      if ($('#'+variable).text() == "Back from lunch") {
        $('#'+variable).hide();
        setCookie('lunch', "00:00:00", exp2);
        settime(curdate);
        absenDatabase(format,0,'start_lunch');
      }else if($('#'+variable).text() == "Back from break" ){
        $('#'+variable).hide();
        setCookie('break', "00:00:00", exp2);
        settime(curdate);
        absenDatabase(format,0,'start_break');
      }else if($('#'+variable).text() == "Back from extrabreak"){
        $('#'+variable).hide();
        setCookie('extra', "00:00:00", exp2);
        settime(curdate);
        absenDatabase(format,0,'start_extra_break');
      }

      if (variable == "lunch" && $('#'+variable).text() == "Out for lunch") {
        $('#'+variable).text("Back from lunch");
        clearTimeout(t);
        setCookie('lunch', timerTime, exp2);
        absenDatabase(format,0,'lunch');
      }else if(variable == "break" && $('#'+variable).text() == "Out for break"){
        $('#'+variable).text("Back from break");
        clearTimeout(t);
        setCookie('break', timerTime, exp2);
        absenDatabase(format,0,'break');
      }else if (variable == "extrabreak" && $('#'+variable).text() == "Out for extra break") {
        $('#'+variable).text("Back from extrabreak");
        clearTimeout(t);
        setCookie('extra', timerTime, exp2);
        absenDatabase(format,0,'extra');
      }


    }

    function signout(status){
        var r = confirm("Anda yakin ingin signout??");
        if (r == true) {
          $('#lunch').text("Out for lunch");
          $('#break').text("Out for break");
          $('#extrabreak').text("Out for extra break");
          $("#signin").show();
          $(".show").hide();
          clearTimeout(t);
          curdate = new Date();
          var format = formatDate(curdate);
          if (status == 'signout') {
            absenDatabase(format,1,status);
          }
          seconds = 0; minutes = 0; hours = 0;
          setCookie('time', "00:00:00", exp);
          setCookie('absen', "00:00:00", exp);
          update();
          waktu = window.setInterval(update, 1000);
          deleteCookie('lunch');
          deleteCookie('break');
          deleteCookie('extra');
          deleteCookie('time');
          deleteCookie('absen');
        } 
        
    }

    function update(){
        var months = [
          'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ];

        var days = [
          'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
        ];
      var date = new Date();
      
      var ampm = date.getHours() < 12
                 ? 'AM'
                 : 'PM';
      
      var hours = date.getHours() == 0
                  ? 12
                  : date.getHours() > 12
                    ? date.getHours() - 12
                    : date.getHours();
      
      var minutes = date.getMinutes() < 10 
                    ? '0' + date.getMinutes() 
                    : date.getMinutes();
      
      var seconds = date.getSeconds() < 10 
                    ? '0' + date.getSeconds() 
                    : date.getSeconds();
      
      var dayOfWeek = days[date.getDay()];
      var month = months[date.getMonth()];
      var day = date.getDate();
      var year = date.getFullYear();
      
      var dateString = dayOfWeek + ', ' + month + ' ' + day + ', ' + year;
      $(".Timer").text(hours+':'+minutes+':'+seconds+':'+ampm+'');
      console.log('masuk gan');
      // $dOut.text(dateString);
      // $hOut.text(hours);
      // $mOut.text(minutes);
      // $sOut.text(seconds);
      // $ampmOut.text(ampm);
    } 
  
  function settime(date){
    // Set the expire time
    exp.setTime(date + 2592000000);
    // Get time from cookie
    var cookieTime = getCookie('time');
    console.log('fSettime:: CookieTime : '+cookieTime);
    console.log('status absen '+statusabsen);
    console.log('jam absen :'+jamabsen);
    if (statusabsen > 0) {

      if (logoutabsen == '') {
        cookieTime = jamabsen;
      }if (jamlunch != '') {
        cookieTime = jamlunch;
        
      }if (jambreak != '') {
        cookieTime = jambreak;
      }if (jamextra != '') {
        cookieTime = jamextra;
      }
    }
    // If timer value is saved in the cookie
    if( cookieTime != null && cookieTime != '00:00:00' ) {
      
      var savedCookie = cookieTime;
      var initialSegments = savedCookie.split('|');
      var savedTimer = initialSegments[0];

      var timerSegments = savedTimer.split(':');
       seconds = parseInt(timerSegments[2]);
        minutes = parseInt(timerSegments[1]);
        hours = parseInt(timerSegments[0]);
        console.log('fSettime:: masuknya jam : '+savedCookie);
       document.getElementById('timerValue').textContent = savedTimer;
      timer();

      $('#stop').removeAttr('disabled');
      $('#reset').removeAttr('disabled');
    } else {
      seconds = 0; minutes = 0; hours = 0;
      timerDiv.textContent = "00:00:00";
      timer();
    }

  }

  function add() {

    seconds++;
    if (seconds >= 60) {
      seconds = 0;
      minutes++;
      if (minutes >= 60) {
        minutes = 0;
        hours++;
      }
    }

    timerDiv.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00")
      + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00")
      + ":" + (seconds > 9 ? seconds : "0" + seconds);

    // Set a 'time' cookie with the current timer time and expire time object.
    var timerTime = timerDiv.textContent.replace("%3A", ":");
    // console.log('timerTime', timerTime);
    setCookie('time', timerTime + '|' + curdate, exp);
    timer();
  }

  function timer() {
    t = setTimeout(add, 1000);
  }

  // // timer(); // autostart timer

  // /* Start button */
  // start.onclick = timer;

  // /* Stop button */
  // stop.onclick = function() {
  //   clearTimeout(t);
  // }

  // /* Clear button */
  // reset.onclick = function() {
  //   timerDiv.textContent = "00:00:00";
  //   seconds = 0; minutes = 0; hours = 0;
  //   setCookie('time', "00:00:00", exp);
  // }

  // /**
  //  * Javascript Stopwatch: Button Functionality
  //  * by @websightdesigns
  //  */

  // $('#start').on('click', function() {
  //   $('#stop').removeAttr('disabled');
  //   $('#reset').removeAttr('disabled');
  // });

  // $('#stop').on('click', function() {
  //   $(this).prop('disabled', 'disabled');
  // });

  // $('#reset').on('click', function() {
  //   $(this).prop('disabled', 'disabled');
  // });

  // /**
  //  * Javascript Stopwatch: Cookie Functionality
  //  * by @websightdesigns
  //  */

  function setCookie(name, value, expires) {
    document.cookie = name + "=" + value + "; path=/" + ((expires == null) ? "" : "; expires=" + expires.toGMTString());
  }

  function getCookie(name) {
    var cname = name + "=";
    var dc = document.cookie;

    if (dc.length > 0) {
      begin = dc.indexOf(cname);
      if (begin != -1) {
      begin += cname.length;
      end = dc.indexOf(";", begin);
        if (end == -1) end = dc.length;
        return unescape(dc.substring(begin, end));
      }
    }
    return null;
  }
