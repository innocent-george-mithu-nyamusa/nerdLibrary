/*! map.js | Friendkit | © Css Ninja. 2019-2020 */
"use strict";
var map, themeColors = {primary: "#6F2B8C", secondary: "#ED383B"}, locations = {
    type: "FeatureCollection",
    features: [{
        type: "Feature",
        properties: {name: "Dan Walker", logo: "assets/img/avatars/dan.jpg", distance: .7},
        geometry: {type: "Point", coordinates: [-77.038659, 38.931567]}
    }, {
        type: "Feature",
        properties: {name: "Ken Bogard", logo: "assets/img/avatars/ken.jpg", distance: .9},
        geometry: {type: "Point", coordinates: [-77.04917572739542, 39.9294445481959]}
    }, {
        type: "Feature",
        properties: {name: "Milly Augustine", logo: "assets/img/avatars/milly.jpg", distance: 4.2},
        geometry: {type: "Point", coordinates: [-76.9898112710817, 38.8895342079819]}
    }, {
        type: "Feature",
        properties: {name: "Edward Mayers", logo: "assets/img/avatars/edward.jpeg", distance: 1.2},
        geometry: {type: "Point", coordinates: [-77.00479301834466, 38.877053582287495]}
    }, {
        type: "Feature",
        properties: {name: "Elise Walker", logo: "assets/img/avatars/elise.jpg", distance: .6},
        geometry: {type: "Point", coordinates: [-77.090372, 38.881189]}
    }, {
        type: "Feature",
        properties: {name: "Gaelle Morris", logo: "assets/img/avatars/gaelle.jpeg", distance: 1.8},
        geometry: {type: "Point", coordinates: [-77.01183574582745, 38.86857043885428]}
    }, {
        type: "Feature",
        properties: {name: "Michael Baker", logo: "assets/img/avatars/michael.jpg", distance: 2.6},
        geometry: {type: "Point", coordinates: [-77.03644340427914, 38.88124994936405]}
    }, {
        type: "Feature",
        properties: {name: "Nelly Schwartz", logo: "assets/img/avatars/nelly.png", distance: 1.3},
        geometry: {type: "Point", coordinates: [-77.0300660512461, 38.89122869283593]}
    }, {
        type: "Feature",
        properties: {name: "Aline Kovalsky", logo: "assets/img/avatars/aline.jpg", distance: 1.9},
        geometry: {type: "Point", coordinates: [-77.04021874884195, 38.89482356721561]}
    }, {
        type: "Feature",
        properties: {name: "Cathy Wright", logo: "assets/img/avatars/cathy.png", distance: 1.7},
        geometry: {type: "Point", coordinates: [-77.04474417208833, 38.89635248217012]}
    }, {
        type: "Feature",
        properties: {name: "Bobby Brown", logo: "assets/img/avatars/bobby.jpg", distance: 3.1},
        geometry: {type: "Point", coordinates: [-77.0156464467101, 38.89509742773548]}
    }, {
        type: "Feature",
        properties: {name: "Stella Bergmann", logo: "assets/img/avatars/stella.jpg", distance: 1.8},
        geometry: {type: "Point", coordinates: [-77.0222336382688, 38.900405978408486]}
    }, {
        type: "Feature",
        properties: {name: "Daniel Wellington", logo: "assets/img/avatars/daniel.jpg", distance: 2.2},
        geometry: {type: "Point", coordinates: [-77.03608398758193, 38.905382162894846]}
    }, {
        type: "Feature",
        properties: {name: "David Kim", logo: "assets/img/avatars/david.jpg", distance: 1.6},
        geometry: {type: "Point", coordinates: [-77.031706, 38.914581]}
    }, {
        type: "Feature",
        properties: {name: "Lana Henrikssen", logo: "assets/img/avatars/lana.jpeg", distance: 2.1},
        geometry: {type: "Point", coordinates: [-77.020945, 38.878241]}
    }, {
        type: "Feature",
        properties: {name: "Mike Lasalle", logo: "assets/img/avatars/mike.jpg", distance: 2.9},
        geometry: {type: "Point", coordinates: [-77.007481, 38.876516]}
    }, {
        type: "Feature",
        properties: {name: "Rolf Krupp", logo: "assets/img/avatars/rolf.jpg", distance: 1.4},
        geometry: {type: "Point", coordinates: [-77.03608398758193, 38.905382162894846]}
    }]
};

function loadLayers() {
    map.addSource("places", {type: "geojson", data: locations}), map.addLayer({
        id: "places",
        type: "circle",
        source: "places",
        paint: {
            "circle-color": themeColors.primary,
            "circle-radius": 6,
            "circle-stroke-width": 2,
            "circle-stroke-color": "#ffffff"
        }
    });
    new mapboxgl.Popup({closeButton: !1, closeOnClick: !1});
    map.on("click", "places", (function (e) {
        for (var a = e.features[0].geometry.coordinates.slice(), t = (e.features[0].properties.description, e.features[0].properties.name), o = e.features[0].properties.logo, s = e.features[0].properties.distance; Math.abs(e.lngLat.lng - a[0]) > 180;) a[0] += e.lngLat.lng > a[0] ? 360 : -360;
        (new mapboxgl.Popup).setLngLat(a).setHTML('\n        <div class="map-box-location">\n          <div class="map-box-header">\n            <div class="media-flex-center">\n              <div class="avatar-wrap">\n                <img\n                  class="avatar"\n                  src="' + ("development" === env ? o : "https://via.placeholder.com/150x150") + '"\n                  alt=""\n                />\n              </div>\n              <div class="flex-meta">\n                <span class="is-dark-heading">' + t + "</span>\n                <span>" + s + " mile(s)</span>\n              </div>\n            </div>\n          </div>\n        </div>\n      ").addTo(map)
    })), map.on("mouseenter", "places", (function () {
        map.getCanvas().style.cursor = "pointer"
    })), map.on("mouseleave", "places", (function () {
        map.getCanvas().style.cursor = ""
    }))
}

function initMapBox() {
    var e = "";
    if (e = "dark" === window.localStorage.getItem("theme") ? "mapbox://styles/mapbox/dark-v10" : "mapbox://styles/mapbox/light-v10", $("#mapbox-1").length) {
        mapboxgl.accessToken = "pk.eyJ1IjoiY3NzbmluamEiLCJhIjoiY2toZW1nYm0zMDAxODJycXFzZ3g4cnZ6diJ9.9ebfrGREuwkauRr_afDTgA", (map = new mapboxgl.Map({
            container: "mapbox-1",
            style: e,
            center: [-77.04, 38.907],
            zoom: 12
        })).on("load", (function () {
            loadLayers()
        }));
        var a = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            marker: {color: themeColors.primary}
        });
        document.getElementById("geocoder").appendChild(a.onAdd(map))
    }
}

$(document).ready((function () {
    initMapBox(), $(".map-box").on("click", (function () {
        $(".map-box").removeClass("is-active"), $(this).addClass("is-active");
        var e = $(this).attr("data-lat"), a = $(this).attr("data-long"), t = parseInt($(this).attr("data-feature")),
            o = document.getElementsByClassName("mapboxgl-popup");
        o.length && o[0].remove(), map.flyTo({center: [e, a], zoom: 15, bearing: 0, essential: !0});
        var s = locations.features[t].properties.name, n = locations.features[t].properties.logo,
            r = locations.features[t].properties.distance;
        new mapboxgl.Popup({closeOnClick: !1}).setLngLat([e, a]).setHTML('\n          <div class="map-box-location">\n            <div class="map-box-header">\n              <div class="media-flex-center">\n                <div class="avatar-wrap">\n                  <img\n                    class="avatar"\n                    src="' + ("development" === env ? n : "https://via.placeholder.com/150x150") + '"\n                    alt=""\n                  />\n                </div>\n                <div class="flex-meta">\n                  <span class="is-dark-heading">' + s + "</span>\n                  <span>" + r + " mile(s)</span>\n                </div>\n              </div>\n            </div>\n          </div>\n        ").addTo(map)
    })), $(document).on("themeChange", (function (e, a) {
        console.log(a), map.removeLayer("places"), map.removeSource("places"), "dark" === a ? map.setStyle("mapbox://styles/mapbox/dark-v10") : map.setStyle("mapbox://styles/mapbox/light-v10"), map.on("style.load", (function () {
            !function e() {
                if (map.isStyleLoaded()) {
                    map.addSource("places", {type: "geojson", data: locations}), map.addLayer({
                        id: "places",
                        type: "circle",
                        source: "places",
                        paint: {
                            "circle-color": themeColors.primary,
                            "circle-radius": 6,
                            "circle-stroke-width": 2,
                            "circle-stroke-color": "#ffffff"
                        }
                    });
                    new mapboxgl.Popup({closeButton: !1, closeOnClick: !1});
                    map.on("click", "places", (function (e) {
                        var a = e.features[0].geometry.coordinates.slice();
                        for (e.features[0].properties.description; Math.abs(e.lngLat.lng - a[0]) > 180;) a[0] += e.lngLat.lng > a[0] ? 360 : -360;
                        (new mapboxgl.Popup).setLngLat(a).setHTML('\n                  <div class="map-box-location">\n                    <div class="map-box-header">\n                      <div class="media-flex-center">\n                        <div class="avatar-wrap">\n                          <img\n                            class="avatar"\n                            src="' + ("development" === env ? logo : "https://via.placeholder.com/150x150") + '"\n                            alt=""\n                          />\n                        </div>\n                        <div class="flex-meta">\n                          <span class="is-dark-heading">' + name + "</span>\n                          <span>" + distance + " mile(s)</span>\n                        </div>\n                      </div>\n                    </div>\n                  </div>\n                ").addTo(map)
                    })), map.on("mouseenter", "places", (function () {
                        map.getCanvas().style.cursor = "pointer"
                    })), map.on("mouseleave", "places", (function () {
                        map.getCanvas().style.cursor = ""
                    }))
                } else setTimeout(e, 1500)
            }()
        }))
    }))
}));