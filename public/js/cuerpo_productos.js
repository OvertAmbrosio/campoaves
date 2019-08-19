$(document).ready(function(){
  // variables
  var $header_top = $('.header-top');
  var $nav = $('nav');

  // fullpage customization
  $('#fullpage').fullpage({
    sectionSelector: '.vertical-scrolling',
    navigation: true,
    slidesNavigation: true,
    css3: true,
    controlArrows: false,
    anchors: ['linea-pollos', 'linea-gallinas', 'linea-pavos', 'linea-patos', 'linea-pekin','linea-huevos'],
    menu: '#menu',
  }); 
});