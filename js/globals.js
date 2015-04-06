var WIDTH  = $("#scene").width();
var HEIGHT = $("#scene").height();

var ORIGIN = new THREE.Vector3(0, 0, 0);
var CAM_START = new THREE.Vector3(0, -50, 80);


var animating = false;

var markerColor = 0xcccccc;
var columnColor = 0x000000;
var step = -1;

var height_scale = 2;
var vec_scale = 5;
var hex = 0xcccc00;
var wait_interval = 1000;

//FLAGS for toggles
var showContours = false;
var showTimestamps = true;
var animating = false;

//UTM step size is 30 meters
var STEP_SIZE = 30;

MAPx = 100;
MAPy = 76;
DEMx = 458;
DEMy = 344;

// UTM
var MAX_UTMx = 572109.034; // rightmost
var MIN_UTMx = 558369.034; // leftmost
var MAX_UTMy = 4903953.876; //nortmost
var MIN_UTMy = 4893633.876; //southmost

// Lat/Lon

/*
upper right lat/lon: 44.286492, -122.268442
upper left lat/lon: 44.285258, -122.096256
lower right lat/lon: 44.192358, -122.097675
lower left lat/lon: 44.193586, -122.269592
center lat/lon: 44.239458, -122.182992

*/

//SCENE

var scene = new THREE.Scene();
var renderer = new THREE.WebGLRenderer({alpha:true});
var camera = new THREE.PerspectiveCamera(60, WIDTH/HEIGHT, 0.1, 500);
var ambientLight = new THREE.AmbientLight(0xffffff);

// Printing function (replaces console.log)

function output(string) {
     var newMessage = "";
     var oldMessage = $("#console").html();
     
     if (oldMessage.length > 7000) {
          oldMessage = "";
     }
     
     if (showTimestamps) {
        newMessage = string + " <br/><i>Posted: " + new Date().toLocaleString() + "<br/><br/>" + oldMessage;
     }
     else {
        newMessage = string + "<br/><br/>" + oldMessage;
     }
     $("#console").html(newMessage);
}















