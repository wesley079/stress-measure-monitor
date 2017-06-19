
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

if(window.location.href.indexOf("new_session") > -1) {
    var checkInterval = setInterval(checkCodeStatus,1000);

    function checkCodeStatus(){
        $.ajax({url: "/checkCodeStatus?code=" + document.getElementById('session_code').innerHTML, success: function(result){
            if(result == "connected"){
                window.location.href = "/connected_session";
            }
        }});
    }
}

if(window.location.href.indexOf("connected_session") > -1) {
    var checkInterval = setInterval(checkAirplaneStatus,1000);

    function checkAirplaneStatus(){
        $.ajax({url: "/checkAirplaneMode?code=" + document.getElementById('session_code').innerHTML, success: function(result){
            if(result == "correct"){
                clearInterval(checkInterval);
                var status = document.getElementById('airplaneStatus');
                status.innerHTML = "Connected";
                status.classList += " done";

                var timer = new Timer();
                timer.start({countdown: true, startValues: {seconds: 10}});
                $('#countdownExample .values').html(timer.getTimeValues().toString());
                timer.addEventListener('secondsUpdated', function (e) {
                    $('#countdownExample .values').html(timer.getTimeValues().toString());
                });
                timer.addEventListener('targetAchieved', function (e) {
                    $('#countdownExample .values').html('Redirecting');
                    window.location.href = "/current_session";
                });
            }
        }});
    }
}
if(window.location.href.indexOf("current_session") > -1) {
    var checkInterval = setInterval(checkSessionEnd,1000);

    function checkSessionEnd(){
        $.ajax({url: "/sessionEnd?code=" + document.getElementById('session-code').innerHTML, success: function(result){
            if(result == "correct"){
                clearInterval(checkInterval);
                endSession();
            }
        }});
    }

    function endSession(){
        //get timer values

        var totaltime = timer.getTotalTimeValues().seconds;


        $.ajax({url: "/endSessionDesktop?code=" + document.getElementById('session-code').innerHTML + "&time=" + (startValue - totaltime) + "&aimed=" + startValue, success: function(result){
            if(result == "correct"){
                //clearInterval(checkInterval);
                window.location.href = "/end_session";

            }
        }});
    }
}

