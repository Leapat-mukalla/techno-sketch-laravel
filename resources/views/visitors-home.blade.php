@extends('layouts.main-visitors')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 align-self-center mb-4 ">
            <h4 style="color: #212529"> العد التنازلي للمعرض</h4>
        </div>
        <div class="col-12">
            <div id="countdown">
                <span id="days">00</span> ايام
                <span id="hours">00</span> ساعات
                <span id="minutes">00</span> دقائق
                <span id="seconds">00</span> ثواني
            </div>
        </div>
        <div class="col-12 align-self-center mb-4 mt-5">
            <h4 style="color: #212529">  رمز الاستجابة الخاصة بك</h4>
        </div>
        <div class="col-12">
            <div class="card card-block card-stretch card-height ">
                <div class="card-body  align-self-center">
                    <div id="countdown"></div>
                <div class=" ">
                    {!! $qrCode !!}

                </div>

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


    function fetchUpdatedData() {
        $.ajax({
            url: '/getUpdatedVisitorsScan',
            type: 'GET',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                // Check if visitor status has changed
                if (response.visitorScan) {
                    // Refresh the page or update specific content
                    // location.reload(); // Refresh the entire page
                    window.location.href = '/visitors-scan'

                }
            }
        });
    }
    // Poll for updated data every 30 seconds (adjust as needed)
    setInterval(fetchUpdatedData, 30000);
</script>
@endsection
