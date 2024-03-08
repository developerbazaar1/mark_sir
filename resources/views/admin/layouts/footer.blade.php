 <!-- Essential javascripts for application to work-->
    <script src="{{ URL::asset('admin-assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ URL::asset('admin-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('admin-assets/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin-assets/js/plugins/sweetalert.min.js') }}"></script>
    <!-- Page specific javascripts-->
    <script>
       // Wait for the DOM content to be fully loaded
       document.addEventListener('DOMContentLoaded', function() {
           // Get the elements with the class name 'success_alert'
           var success_alerts = document.getElementsByClassName('success_alert');

           // Loop through each element with the class name 'success_alert'
           for (var i = 0; i < success_alerts.length; i++) {
               var success_alert = success_alerts[i];

               // Set a timeout to hide the element after 2 seconds (2000 milliseconds)
               setTimeout(function(alertElement) {
                   // Hide the element by setting its display style to 'none'
                   alertElement.style.display = 'none';
               }, 20000, success_alert); // 2 seconds in milliseconds
           }
       });
   </script>
  
   
@yield('scripts')