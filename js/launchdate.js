/////////////////////////////////
///////  COUNTDOWN TIMER  ///////
if (typeof launch_date !== 'undefined') {
    var now = new Date();
    var diff = launch_date - now;
    if (diff > 0 ) {

        var span_secondes = $('#span_secondes');
        var span_minutes = $('#span_minutes');
        var span_heures = $('#span_heures');
        var span_jours = $('#span_jours');


        setInterval( function() {
            var now = new Date();
            var diff = launch_date - now;
            if (diff > 0 ) {
                var seconds = diff / 1000;
                var minutes = seconds / 60;
                var hours = minutes / 60;
                span_secondes.html( Math.floor(seconds) % 60 );
                span_minutes.html( Math.floor(minutes) % 60 );
                span_heures.html( Math.floor(hours) % 24 );
                span_jours.html( Math.floor(hours / 24) );
            };

        }, 1000 );

    };
} // if we have launch date
