//
// Implementing PING in JavaScript
// Copyright 2008, Ameer Dawood
//
// Free for reuse as long as this copyright notice remains


/*
 usage:

  var pinger = new Pinger();
  pinger.ping(some_ip, callbackFunction);

  this creates a Pinger object and pings the supplied IP. The callbackFunction will be called with the results
  the prototype for the callback function is:

  function callback(ipWePinged, hostIsAlive, timeInMillisecondsOfPing) { ... }

  Where ipWePinged is a string
        hostIsAlive is a boolean
        timeInMillisecondsOfPing is a number
*/


/* ---------------- */
/* Common Functions */
/* ---------------- */

function $(id) 
{
  return document.getElementById(id);
}

//================== Basic GUI Stuff

function addSimpleRow(table, cols) 
{

  var tbl = $(table);
  var row = tbl.insertRow(tbl.rows.length);
  var cell = null;
  for(var i=0; i < cols.length; i++) 
  {
    cell = row.insertCell(i);
    cell.appendChild(document.createTextNode(cols[i]));
  }

}

function clearTable(table, saveTopRow) 
{
    var stopAt = (saveTopRow != undefined) ? 2 : 1;

    var tbl = $(table);
    var lastRow = tbl.rows.length;
    while(tbl.rows.length >= stopAt) 
    {
        tbl.deleteRow(tbl.rows.length-1);
    }
}

//=================== Utils

function occurancesOf(s, lookFor) 
{
    var count = 0;
    var offset =-1;
    while( (offset = s.indexOf(lookFor, offset+1)) != -1) 
    {
        count++;
    }
    return count;
}


/* ---------------- */
/* Pinger Functions */
/* ---------------- */

function Pinger() {

  this.ip = '';
  this.inUse = false;
  this.callback = null;

  //time holders
  this.start = null;
  this.end = null;

  //image object
  this.img = null;
  this.timer = null;
}

function Pinger_ping(ip, callback) 
{
  if(!this.inUse) 
  {
    this.inUse = true;
    this.callback = callback
    this.ip = ip;

    var _that = this;

    this.img = new Image();

    this.img.onload = function() {_that.good();};
    this.img.onerror = function() {_that.good();};

    this.start = new Date().getTime();
    this.img.src = "http://" + ip;
    this.timer = setTimeout(function() { _that.bad();}, 1500);

  }
}

function Pinger_good() 
{
  if(this.inUse) 
  {
    this.inUse = false;
    this.end = new Date().getTime();
    //clear the timer & img
    clearTimeout(this.timer);
    this.img = null;
    this.callback(this.ip,true, this.end - this.start);
  }
}

function Pinger_bad() 
{
  if(this.inUse) 
  {
    this.inUse = false;
    this.end = new Date().getTime();
    //clear the timer & img
    clearTimeout(this.timer);
    this.img = null;
    this.callback(this.ip,false, this.end - this.start);
  }

}

Pinger.prototype.ping = Pinger_ping;
Pinger.prototype.good = Pinger_good;
Pinger.prototype.bad = Pinger_bad;

