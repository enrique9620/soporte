function getUrl(){
    var url = 'https://soporte.sm2consultores.com/';
    // var url = 'http://localhost/';
    return url;
}

window.server = "https://services.sm2consultores.com/soporte/";
// window.server = "http://localhost/soporteServices/";

 function generateUUID() {
          var d = new Date().getTime();

          var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
              var r = (d + Math.random()*16)%16 | 0;
              d = Math.floor(d/16);
              return (c=='x' ? r : (r&0x7|0x8)).toString(16);
          });
          return uuid;
      };
