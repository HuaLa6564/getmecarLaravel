<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Google Map</title>
    <style>
        #map{
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>My Google Map</h1>
    <div id="map"></div>
    <script>
        function initMap(){
            //map option with country latitude and longitude
            var options = {
                zoom:8,
                center:{lat:4.2105, lng:101.9758}
            }
            //new map 
            var map = new google.maps.Map(document.getElementById('map'),options);

            //listen for click on map 
            google.maps.event.addListener(map, 'click', 
                function(event){
                    //add marker 
                    addMarker({coords:event.latLng});
            }); 

            /*
            //add marker with region latitude and longitude
            var marker = new google.maps.Marker({
                position:{lat:5.9580, lng:102.2499},
                map:map,
                //custom icon
                icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
            });
            //pop up window 
            infoWindow = new google.maps.InfoWindow({
                content:'<h1>Yuni Here</h1>'
            });
            //pop up when clicked the marker
            marker.addListener('click',function(){
                infoWindow.open(map,marker);
            });
            */
           
            //array of markers
            let markers = [
            {
                //First marker 
                coords:{lat:5.9580, lng:102.2499},
                iconImage: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                content: '<h1>One Here</h1>'
            },
            {
                //Second marker 
                coords:{lat:5.3679, lng:103.0472},
                // iconImage: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                content: '<p>Two Here</p>'
            },
            {
                //Third marker
                coords:{lat:38.9637, lng:35.2433},
                content: '<h1>Three Here</h1>'
            }
            ];
            
            //loop through markers 
            for (var i=0; i<markers.length; i++){
                //add marker
                addMarker(markers[i]);
            }

            //THIS HAS BEEN PUT IN ARRAY 
            // addMarker({
            //     coords:{lat:5.9580, lng:102.2499},
            //     iconImage: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            //     content: '<h1>YUNI Here</h1>'
            // });

            // addMarker({
            //     coords:{lat:5.3679, lng:103.0472},
            //     content: '<h1>Syirin Here</h1>'
            // });
            // addMarker({coords:{lat:38.9637, lng:35.2433}});
           

            //add marker function
            function addMarker(props){
                var marker = new google.maps.Marker({
                position:props.coords,
                content: props.content,
                map:map
                //custom icon
                //icon: props.iconImage
            });
                //check for custom icon    
                if (props.iconImage){
                    //set icon image
                    marker.setIcon(props.iconImage);
                }
                //check content 
                if(props.content){
                     //pop up window 
                    let infoWindow = new google.maps.InfoWindow({content: props.content});
                    //pop up when clicked the marker
                    marker.addListener('click',function(){
                        infoWindow.open(map,marker);
                    });
                    
                }
            }
        }
    </script>
    <script defer src="https://maps.googleapis.com/maps/api/js?keyAIzaSyCaT_3YWTBh7nnmw3QpLIjiV_p1R2S29ss&callback=initMap">
    </script>
</body>
</html>