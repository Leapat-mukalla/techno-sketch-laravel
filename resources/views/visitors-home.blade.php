@extends('layouts.main-visitors')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 align-self-center mb-4 ">
            <h4 style="color: #212529"> العد التنازلي للمعرض ⏳ </h4>
        </div>
        <div class="col-12 text-center ">
            <div id="countdown" class="d-flex justify-content-center align-items-center mt-3">
                <div class="countdown-section">
                  <span id="days" class="h1 days">-</span>
                  <div class="text-center text-black-50">ايام</div>
                </div>
                <div class="countdown-section">
                  <span id="hours" class="h1 hours">-</span>
                  <div class="text-center text-black-50">ساعات</div>
                </div>
                <div class="countdown-section">
                  <span id="minutes" class="h1 minutes">-</span>
                  <div class="text-center text-black-50">دقائق</div>
                </div>
                <div class="countdown-section">
                  <span id="seconds" class="h1 seconds">-</span>
                  <div class="text-center text-black-50">ثواني</div>
                </div>
              </div>
        </div>

    </div>
</div>
<script>
 function updateCountdown() {
                var eventDate = new Date("{{ $event->end_date }} {{ $event->end_time }}").getTime();
                var eventStart = new Date("{{ $event->start_date }} {{ $event->start_time }}").getTime();
                var now = new Date().getTime();

                // Check if the current time is after the start of the event
                if (now >= eventStart) {
                    // Display the countdown timer
                    document.getElementById("countdown").style.display = "block";

                    // Check if the event has ended
                    if (now > eventDate) {
                        // Display a message indicating that the event has ended
                        document.getElementById("countdown").innerHTML = "انتهى العد التنازلي";
                    } else {
                        // Calculate the remaining time until the event ends
                        var distance = eventDate - now;
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // Display the remaining time in the countdown timer
                        document.getElementById("days").innerText = days;
                        document.getElementById("hours").innerText = hours;
                        document.getElementById("minutes").innerText = minutes;
                        document.getElementById("seconds").innerText = seconds;
                    }
                } else {
                    // Hide the countdown timer if the event has not started yet
                    document.getElementById("countdown").style.display = "none";
                }
        }
        // Call the updateCountdown function immediately
        updateCountdown();

        // Update countdown every second
        setInterval(updateCountdown, 1000);
</script>
@endsection
