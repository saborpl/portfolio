// DYMKI do obiektów
// Skrypt wymaga umieszczenia znacznika
// <div id="dymek" style="position: absolute; visibility: hidden;"></div>
// na pocz±tku dokumentu
var IE = document.all?true:false

if (!IE) {
   document.captureEvents(Event.MOUSEMOVE);
   document.onmousemove=mousePos;
   var netX, netY;
}

function posX() {
	if (IE) {
	   tempX=document.body.scrollLeft + event.clientX;
	}
	if (tempX<0) {
	   tempX=0;
	}
	return tempX;
}

function posY(e) {
	if (IE) {
	    tempY = event.clientY + document.body.scrollTop;
	}
	if (tempY<0) {
	   tempY=0;
	}
	return tempY;
}

function mousePos(e) {
	netX=e.pageX;
	netY=e.pageY;
}

function dymekPokaz(pX, pY, src) {
	if (IE) {
	   document.all.dymek.style.visibility='visible';
	   document.all.dymek.innerHTML=src;
	   document.all.dymek.style.left=posX()+pX+"px";
	   document.all.dymek.style.top=posY()+pY+"px";
	}
	else {
		 document.getElementById("dymek").style.visibility='visible';
		 document.getElementById("dymek").style.left=netX+pX+"px";
		 document.getElementById("dymek").style.top=netY+pY+"px";
		 document.getElementById("dymek").innerHTML=src;
	}
}

function dymekPrzesun(pX, pY) {
	if (IE) {
	   document.all.dymek.style.left=posX()+pX+"px";
	   document.all.dymek.style.top=posY()+pY+"px";
	}
	else {
		 document.getElementById("dymek").style.left=netX+pX+"px";
		 document.getElementById("dymek").style.top=netY+pY+"px";
	}
}

function dymekZamknij() {
	if (IE) {
	   document.all.dymek.innerHTML='';
	   document.all.dymek.style.visibility='hidden';
	}
	else {
		 document.getElementById("dymek").style.visibility='hidden';
		 document.getElementById("dymek").innerHTML='';
	}
}

function dymekKom(tresc) {
	text='<table cellspacing=2 cellpadding=3 width=250 cellpadding=2>';
//	text+='<tr><td style="font-size: 11px; background-color: white; border: solid; border-width: 1px; border-color: black;">informacja od udostêpniajacego:</td></tr>';
	text+='<tr><td style="font-size: 11px; background-color: #F7F5ED; border: solid; border-width: 1px; border-color: black; ">'+tresc+'</td></tr></table>';
	dymekPokaz(0, -15, text);
}

function dymekLinkPrzesun() {
	dymekPrzesun(0, 15);
}

function dymekSrodekPrzesun() {
	dymekPrzesun(-90, 15);
}