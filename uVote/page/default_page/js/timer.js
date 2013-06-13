var jahr=2014, monat=01, tag=01, stunde=20, minute=00, sekunde=00;
var zielDatum=new Date(jahr,monat-1,tag,stunde,minute,sekunde);

function count() {
  startDatum=new Date(); // Aktuelles Datum

  if(startDatum<zielDatum)  {

    var jahre=0, monate=0, tage=0, stunden=0, minuten=0, sekunden=0;

    while(startDatum<zielDatum) {
      jahre++;
      startDatum.setFullYear(startDatum.getFullYear()+1);
    }
    startDatum.setFullYear(startDatum.getFullYear()-1);
    jahre--;

    while(startDatum<zielDatum) {
      monate++;
      startDatum.setMonth(startDatum.getMonth()+1);
    }
    startDatum.setMonth(startDatum.getMonth()-1);
    monate--;

    while(startDatum.getTime()+(24*60*60*1000)<zielDatum) {
      tage++;
      startDatum.setTime(startDatum.getTime()+(24*60*60*1000));
    }

    stunden=Math.floor((zielDatum-startDatum)/(60*60*1000));
    startDatum.setTime(startDatum.getTime()+stunden*60*60*1000);

    minuten=Math.floor((zielDatum-startDatum)/(60*1000));
    startDatum.setTime(startDatum.getTime()+minuten*60*1000);

    sekunden=Math.floor((zielDatum-startDatum)/1000);

    (jahre!=1)?jahre=jahre+" Jahre,  ":jahre=jahre+" Jahr,  ";
    (monate!=1)?monate=monate+" Monate,  ":monate=monate+" Monat,  ";
    (tage!=1)?tage=tage+" Tage,  ":tage=tage+" Tag,  ";
    (stunden!=1)?stunden=stunden+" Stunden,  ":stunden=stunden+" Stunde,  ";
    (minuten!=1)?minuten=minuten+" Minuten  und  ":minuten=minuten+" Minute  und  ";
    if(sekunden<10) sekunden="0"+sekunden;
    (sekunden!=1)?sekunden=sekunden+" Sekunden":sekunden=sekunden+" Sekunde";

    document.coolcccount.coolcc.value=
        jahre+monate+tage+stunden+minuten+sekunden;

    setTimeout('count()',200);
  }
  else document.coolcccount.coolcc.value=
      "0 Jahre,  0 Monate,  0 Tage,  0 Stunden,  0 Minuten  und  00 Sekunden";
}