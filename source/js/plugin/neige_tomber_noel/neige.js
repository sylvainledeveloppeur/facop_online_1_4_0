
var snowsrc='source/js/plugin/neige_tomber_noel/snow.gif'; // VOUS ETES PRIE DE BIEN VOULOIR HEBERGE L'IMAGE CHEZ VOUS !
var no = 25;
var ns4up, ie4up, nn6up, doc_width, doc_height;
var dx, xp, yp;
var am, stx, sty;

dx = new Array();
xp = new Array();
yp = new Array();
am = new Array();
stx = new Array();
sty = new Array();

var snowspeed = 2;

function snowNS() {
for (i = 0; i < no; ++ i) {
yp[i] += sty[i];
if (yp[i] > doc_height-50) {
xp[i] = Math.random()*(doc_width-am[i]-30);
yp[i] = 0;
stx[i] = 0.02 + Math.random()/10;
sty[i] = 0.7 + Math.random();
doc_width = self.innerWidth;
doc_height = self.innerHeight;
}
dx[i] += stx[i];
document.layers["dot"+i].top = yp[i];
document.layers["dot"+i].left = xp[i] + am[i]*Math.sin(dx[i]);
}
setTimeout("snowNS()", snowspeed);
}

function snowIE() {
for (i = 0; i < no; ++ i) {
yp[i] += sty[i];
if (yp[i] > doc_height-50) {
xp[i] = Math.random()*(doc_width-am[i]-30);
yp[i] = 0;
stx[i] = 0.02 + Math.random()/10;
sty[i] = 0.7 + Math.random();
doc_width = document.body.clientWidth;
doc_height = document.body.clientHeight;
}
dx[i] += stx[i];
document.all["dot"+i].style.pixelTop = yp[i];
document.all["dot"+i].style.pixelLeft = xp[i] + am[i]*Math.sin(dx[i]);
}
setTimeout("snowIE()", snowspeed);
}

function snowNN6() {
for (i = 0; i < no; ++ i) {
yp[i] += sty[i];
if (yp[i] > doc_height-50) {
xp[i] = Math.random()*(doc_width-am[i]-30);
yp[i] = 0;
stx[i] = 0.02 + Math.random()/10;
sty[i] = 0.7 + Math.random();
doc_width = self.innerWidth;
doc_height = self.innerHeight;
}
dx[i] += stx[i];
document.getElementById("dot"+i).style.top = yp[i]+'px';;
document.getElementById("dot"+i).style.left = Math.abs(xp[i] + am[i]*Math.sin(dx[i]))+'px';
}
setTimeout("snowNN6()", snowspeed);
}

var initsnow = function() {
ns4up = (document.layers) ? 1 : 0;
ie4up = (document.all) ? 1 : 0;
nn6up = (document.getElementById) ? 1 : 0;
var i=0;
doc_width = screen.width;
doc_height = screen.height;

if (ns4up) {
doc_width = self.innerWidth;
doc_height = self.innerHeight;
} else if (ie4up) {
doc_width = document.body.clientWidth;
doc_height = document.body.clientHeight;
} else if (nn6up) {
doc_width = self.innerWidth;
doc_height = self.innerHeight;
}
for (i = 0; i < no; ++ i) {
dx[i] = 0;
xp[i] = Math.random()*(doc_width-50);
yp[i] = Math.random()*doc_height;
am[i] = Math.random()*20;
stx[i] = 0.02 + Math.random()/10;
sty[i] = 0.7 + Math.random();
if (ns4up) {
if (i == 0) {
document.write("<layer name=dot"+ i +" left=15 top=15 visibility=show><img src='"+snowsrc+"' border=0></layer>");
} else {
document.write("<layer name=dot"+ i +" left=15 top=15 visibility=show><img src='"+snowsrc+"' border=0></layer>");
}
} else if (ie4up || nn6up) {
if (i == 0) { document.write("<div id=dot"+ i +" style=\"POSITION: fixe; Z-INDEX: 100"+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' width: 200px border=0></div>");
} else {
document.write("<div id=dot"+ i +" style=\"POSITION: absolute; Z-INDEX: 100"+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' width: 200px border=0></div>");
}
}
}

if (ns4up) {
snowNS();
} else if (ie4up) {
snowIE();
} else if (nn6up) {
snowNN6();
}
}

document.onload=initsnow();

