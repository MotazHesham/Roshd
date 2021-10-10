$(function ()){
'use strict'
var winH = $(window).height(),
	upperH = $('.upper-bar').innerheight(),
	navH	=$('.navbar').innerheight(),
$('.slider').height(winH - (upperH + navH ));
});