function MapManager(node)
{
    if(node === undefined)
        throw "Can\'t create a map manager without a node to embed the map";

    this.mapOptions = {
        zoom: 14,
        center: null,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    this.map = null;

    this.markers = {};

    this.node = node;
}

MapManager.prototype.initMap = function(lat, lon)
{
    this.mapOptions.center = new google.maps.LatLng(lat, lon);
    this.map = new google.maps.Map(this.node, this.mapOptions);
}

// Add a marker to the map and push to the array.
MapManager.prototype.addMarker = function(lat, lon) 
{
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat, lon),
        map: null
    });
    
    this.markers[MD5.generate(lat+','+lon)] = marker;

    return marker;
}

MapManager.prototype.showMarker = function(lat, lon)
{
    this.clearMarkers();

    var marker = this.markers[MD5.generate(lat+','+lon)];

    if(marker === undefined)
        marker = this.addMarker(lat, lon);

    if(this.map === null)
    {
        this.mapOptions.center = marker.getPosition();
        this.map = new google.maps.Map(this.node, this.mapOptions);
    }
    else
        this.map.setCenter(marker.getPosition());
    
    marker.setMap(this.map);
}

// Sets the map on all markers in the array.
MapManager.prototype.setAllMap = function(map) 
{
    for (var markerID in this.markers)
        this.markers[markerID].setMap(map);
}

// Removes the markers from the map, but keeps them in the array.
MapManager.prototype.clearMarkers = function() 
{
    this.setAllMap(null);
}

// Shows any markers currently in the array.
MapManager.prototype.showMarkers = function() 
{
    this.setAllMap(this.map);
}

// Deletes all markers in the array by removing references to them.
MapManager.prototype.deleteMarkers = function() 
{
    this.clearMarkers();
    this.markers = {};
}