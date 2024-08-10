
// map js start
(function ($) {
    function new_map($el) {
        var $markers = $el.find(".marker");
        var args = {
            zoom: 8,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            styles: [
                {
                    featureType: "administrative",
                    elementType: "labels.text.fill",
                    stylers: [
                        {
                            color: "#444444",
                        },
                    ],
                },
                {
                    featureType: "landscape",
                    elementType: "all",
                    stylers: [
                        {
                            color: "#f2f2f2",
                        },
                    ],
                },
                {
                    featureType: "poi",
                    elementType: "all",
                    stylers: [
                        {
                            visibility: "off",
                        },
                    ],
                },
                {
                    featureType: "road",
                    elementType: "all",
                    stylers: [
                        {
                            saturation: -100,
                        },
                        {
                            lightness: 45,
                        },
                    ],
                },
                {
                    featureType: "road.highway",
                    elementType: "all",
                    stylers: [
                        {
                            visibility: "simplified",
                        },
                    ],
                },
                {
                    featureType: "road.arterial",
                    elementType: "labels.icon",
                    stylers: [
                        {
                            visibility: "off",
                        },
                    ],
                },
                {
                    featureType: "transit",
                    elementType: "all",
                    stylers: [
                        {
                            visibility: "off",
                        },
                    ],
                },
                {
                    featureType: "water",
                    elementType: "all",
                    stylers: [
                        {
                            color: "#a3a3a3",
                        },
                        {
                            visibility: "on",
                        },
                    ],
                },
            ],
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
        var latlng = new google.maps.LatLng(
            $marker.attr("data-lat"),
            $marker.attr("data-lng")
        );

        var darkIcon = {
            url: "/wp-content/uploads/2024/08/dark-marker.png",
            scaledSize: new google.maps.Size(60, 60),
        };
        var iconBase = "/wp-content/themes/pss/pixelsmith/images/";

        // create marker
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: darkIcon,
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
            google.maps.event.addListener(marker, "click", function () {
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
            var latlng = new google.maps.LatLng(
                marker.position.lat(),
                marker.position.lng()
            );

            bounds.extend(latlng);
        });

        // only 1 marker?
        if (map.markers.length == 1) {
            // set center of map
            map.setCenter(bounds.getCenter());
            map.setZoom(16);
        } else {
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
        $(".acf-map").each(function () {
            // create map
            map = new_map($(this));
        });
    });
})(jQuery); // map js end