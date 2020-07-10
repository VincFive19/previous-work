import './css/index.css';

import $ from "jquery";

import * as modal from "./modal.js";
import { channelDisplay } from "./view.jsx";

let channelData = {};
let channelsData = [];

//Document on load
$(document).ready(function() {
 $('#authenticate').css('display', 'block');
 $('#logoutButton').css('display', 'none');
 gapi.load("client:auth2", function() {
  gapi.auth2.init({ client_id: "912851574572-uv1p6ajoa45m68ned7divnbe1k15qei1.apps.googleusercontent.com" });
 });
});

//on authenticate button click
$('#authenticate').click(function() {
 modal.gapiRun();
});

//On logout button click
$('#logoutButton').click(function() {
 console.log("logout");
 modal.logoutRun();
});



//On search
$('#searchButton').click(function() {
 let searchText = $('#textSearchInput').val();
 let searchAmount = $('#searchAmount').val();
 
 modal.witRun(searchText, channelData, channelsData, searchAmount, display);
});

//Display, Run view.js
function display(channelsData) {
 channelDisplay(channelsData);
}

