

(function () {
   var canvas = document.getElementById('canvas'),
       context = canvas.getContext('2d'),
       video = document.getElementById('video'),
   vendorUrl = window.URL || window.webkitURL ;

   navigator.getMedia = navigator.getUserMedia ||
                        navigator.webkitGetUserMedia ||
                        navigator.mozGetUserMedia ||
                        navigator.msGetUserMedia;

   navigator.getMedia({
    video: { width: 1280, height: 720 },
    audio: true
   },function (stream) {
       video.srcObject=stream;
       //video.src =window.URL.createObjectURL(stream);

   }, function (error) {
       //An error occured
       //error.code
   });

})();
var vid = document.getElementById("video");
function playVid() {
    vid.play();
}

