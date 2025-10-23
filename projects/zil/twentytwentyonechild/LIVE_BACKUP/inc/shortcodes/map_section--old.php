<div class="map-wrapper" id="mapWrapper">
    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/world_map_colorful.svg' ?>" class="map-image"
        id="mapImage" alt="World Map" />
    <!-- Pins will be added dynamically -->
</div>

<script>
    // Pins data with lat-lon and other info
    const pinsData = [
        { name: "Alex", country: "India", lat: 30.6741248, lon: 76.8442368, img: "https://cdn-icons-png.flaticon.com/512/19007/19007755.png" },
        { name: "DEX", country: "Singapore", lat: -2.81, lon: -171.678, img: "https://cdn-icons-png.flaticon.com/512/19007/19007755.png" },
        { name: "Kaushal", country: "India(Mohali)", lat: 31.7041168, lon: 79.7176885, img: "https://cdn-icons-png.flaticon.com/512/19007/19007755.png" },
    ];

    function latLonToPixel(lat, lon, mapWidth, mapHeight) {
        // Convert longitude to x
        const x = (lon + 180) * (mapWidth / 360);

        // Convert latitude to y (Mercator projection)
        const latRad = lat * Math.PI / 180;
        const mercN = Math.log(Math.tan((Math.PI / 4) + (latRad / 2)));
        const y = (mapHeight / 2) - (mapWidth * mercN / (2 * Math.PI));

        return { x, y };
    }

    function addPins() {
        const mapWrapper = document.getElementById('mapWrapper');
        const mapImage = document.getElementById('mapImage');

        // Get real rendered size of map image
        const mapWidth = mapImage.clientWidth;
        const mapHeight = mapImage.clientHeight;

        // Clear old pins if any
        mapWrapper.querySelectorAll('.pin').forEach(pin => pin.remove());

        pinsData.forEach(pinData => {
            const pos = latLonToPixel(pinData.lat, pinData.lon, mapWidth, mapHeight);

            // Convert pixels to percentage
            const leftPercent = (pos.x / mapWidth) * 100;
            const topPercent = (pos.y / mapHeight) * 100;

            // Create pin element
            const pin = document.createElement('div');
            pin.className = 'pin';
            pin.style.left = `${leftPercent}%`;
            pin.style.top = `${topPercent}%`;
            pin.title = `${pinData.name} (${pinData.country})`;
            pin.setAttribute('tabindex', '0');

            // Image inside pin
            const img = document.createElement('img');
            img.src = pinData.img;
            img.alt = `${pinData.country} Pin`;

            // tooltip
            const tolltip = document.createElement('div');
            tolltip.className = 'tolltip';

            // create heading
            const tolltip_hdng = document.createElement('h3');
            tolltip_hdng.textContent = `${pinData.name}`;

            // create description
            const tolltip_desc = document.createElement('p');
            tolltip_desc.textContent = `${pinData.country}`;

            pin.appendChild(img);
            pin.appendChild(tolltip);
            tolltip.appendChild(tolltip_hdng);
            tolltip.appendChild(tolltip_desc);
            mapWrapper.appendChild(pin);
        });
    }

    // Call addPins on image load and window resize (responsive)
    window.onload = () => {
        const mapImage = document.getElementById('mapImage');
        if (mapImage.complete) {
            addPins();
        } else {
            mapImage.onload = addPins;
        }
    };
    window.onresize = addPins;
</script>