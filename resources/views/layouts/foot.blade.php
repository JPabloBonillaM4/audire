        <script>
            window.Laravel = {!! json_encode([
                'csrfToken'	   	   => csrf_token(),
                'baseUrl' 	   	   => url('/'),
				'currentRoute'    => $current_route
            ]) !!}
        </script>
    </body>
</html>