<?php
// Template Name: maptemplate


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASltGCoOhRClfCT6dGFYvwFKs-pXVSODs"></script>
</head>

<div class="acf-map mapfullwidth" data-aos="fade-down" ; data-aos-offset="-300" data-aos-delay="800"
    data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true"
    data-aos-anchor-placement="top-center">
    <?php 
    if( have_rows('map_marker') ):
    while( have_rows('map_marker') ) : the_row();
         $location = get_sub_field('location');
            $title = get_sub_field('title');
            $description = get_sub_field('description');
        $link_text = get_sub_field('link_text');
?>
    <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
        <a class="infobox" href="https://www.google.com/maps?saddr=My+Location&#038;daddr=<?php echo esc_attr($location['lat']); ?>,<?php echo esc_attr($location['lng']); ?>"
            target="_blank">
            <?php if(!empty($title)){ ?>
            <div class="mymapmarkertitle">
                <?php echo $title; ?></div>
            <?php } if(!empty($link_text)){ ?>
            <p><?php echo $link_text; ?></p><?php } if(!empty($description )){ ?>
            <p><?php echo $description; ?></p>
            <?php }?>
        </a>
    </div>
    <?php 
    endwhile;
else :
endif;
    ?>
</div>

<body>
    <style>
        .acf-map {
            width: %;
            height: 500px;
        }

        .mymapmarkertitle {
            font-weight: 500;
            font-size: 17px;
            text-align: center;
        }
    </style>
    <script type="text/javascript">
        (function ($) {

            function new_map($el) {
                var $markers = $el.find('.marker');
                var args = {
                    zoom: 8,
                    center: new google.maps.LatLng(0, 0),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: false,
                    styles: [
                        {
                            "featureType": "administrative",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#444444"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "color": "#f2f2f2"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": 45
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "color": "#a3a3a3"
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        }
                    ]
                };
                // create map
                var map = new google.maps.Map($el[0], args);
                // add a markers reference
                map.markers = [];
                // add markers
                $markers.each(function () {
                    add_marker($(this), map);
                });
                // center map
                center_map(map);
                // return
                return map;
            }
            function add_marker($marker, map) {

                // var
                var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

                var darkIcon = {
                    url: "https://www.svgrepo.com/show/31706/map-pin.svg",
                    scaledSize: new google.maps.Size(60, 60)
                };
                var iconBase = '/wp-content/themes/pss/pixelsmith/images/';

                // create marker
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: darkIcon
                    // icon: iconBase + 'ccr-map-icon.png'
                });

                // add to array
                map.markers.push(marker);

                // if marker contains HTML, add it to an infoWindow
                if ($marker.html()) {
                    // create info window
                    var infowindow = new google.maps.InfoWindow({
                        content: $marker.html(),
                    });

                    // show info window when marker is clicked
                    google.maps.event.addListener(marker, 'click', function () {

                        infowindow.open(map, marker);

                    });

                    infowindow.open(map, marker);
                }

            }

            /*
            * center_map
            *
            * This function will center the map, showing all markers attached to this map
            *
            * @type function
            * @date 8/11/2013
            * @since 4.3.0
            *
            * @param map (Google Map object)
            * @return n/a
            */
            function center_map(map) {

                // vars
                var bounds = new google.maps.LatLngBounds();

                // loop through all markers and create bounds
                $.each(map.markers, function (i, marker) {

                    var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

                    bounds.extend(latlng);

                });

                // only 1 marker?
                if (map.markers.length == 1) {
                    // set center of map
                    map.setCenter(bounds.getCenter());
                    map.setZoom(16);
                }
                else {
                    // fit to bounds
                    map.fitBounds(bounds);
                }

            }

            /*
            * document ready
            *
            * This function will render each map when the document is ready (page has loaded)
            *
            * @type function
            * @date 8/11/2013
            * @since 5.0.0
            *
            * @param n/a
            * @return n/a
            */
            // global var
            var map = null;

            $(document).ready(function () {

                $('.acf-map').each(function () {

                    // create map
                    map = new_map($(this));

                });

            });

        })(jQuery);
    </script>
</body>

</html>








<!-- For Function.php -->
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyASltGCoOhRClfCT6dGFYvwFKs-pXVSODs';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
