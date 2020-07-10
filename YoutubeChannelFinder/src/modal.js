import $ from "jquery";

//Runs Google Api, log in to oauth
export function gapiRun() {
 return gapi.auth2.getAuthInstance()
  .signIn({ scope: "https://www.googleapis.com/auth/youtube.readonly" })
  .then(function() {
    console.log("Sign-in successful");
    return gapi.client.load("https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest")
     .then(function() {
       console.log("GAPI client loaded for API");
       //Show Search Element, hide log in button
       $('#authenticate').css('display', 'none');
       $('#logoutButton').css('display', 'block');
      },
      function(err) {
       console.error("Error loading GAPI client for API", err);
       window.alert("Error loading GAPI client for API");
      });
   },
   function(err) {
    console.error("Error signing in", err);
    window.alert("Error signing in");
   });
}

//Logs user out
export function logoutRun() {
 var auth2 = gapi.auth2.getAuthInstance();
 auth2.signOut().then(function() {
  console.log('User signed out.');
  $('#authenticate').css('display', 'block');
  $('#logoutButton').css('display', 'none');
 });
}

//Runs the wit api, in order to gain variables frm searched terms
export function witRun(searchText, channelData, channelsData, searchAmount, cb) {
 let display_cb = cb;
 let url = "https://ims-vinciblefive19.c9users.io:8081/?input=" + searchText;
 fetch(url)
  .then((resp) => resp.json()) // Transform the data into json
  .then(function(response) {
   console.log("banana", response);
   let final = JSON.parse(response);
   console.log("tester", final);
   console.log("success!", final);
   console.log(final.entities.search_query[0].value);
   let searchFinish = [];
   for (let i = 0; i < final.entities.search_query.length; i++) {
    searchFinish.push(final.entities.search_query[i].value);
    console.log(searchFinish);
   }
   let searchLinkData = "##" + searchFinish.join(",##");
   console.log(searchLinkData);
   youtubeRun(channelData, channelsData, searchLinkData, searchAmount, display_cb);
  });

 //Original AJAX

 //     $.ajax({
 //  url: 'https://api.wit.ai/message',
 //  data: {
 //   'q': searchText,
 //   'access_token': witAccessToken
 //  },
 //  dataType: 'jsonp',
 //  method: 'GET',
 //  success: function(response) {
 //   console.log("success!", response);
 //   console.log(response.entities.search_query[0].value)

 //   let searchFinish = [];


 //   for (let i = 0; i < response.entities.search_query.length; i++) {


 //    searchFinish.push(response.entities.search_query[i].value)
 //    console.log(searchFinish)
 //   }

 //   let searchLinkData = "##" + searchFinish.join(",##")



 //   console.log(searchLinkData)

 //   youtubeRun(channelData, channelsData, searchLinkData, searchAmount, display_cb);
 //   //YOUTUBE AND GOOGLE RESULT HANDLING



 //  }
 // });
}

//YOUTUBE AND GOOGLE RESULT HANDLING
function youtubeRun(channelData, channelsData, searchLinkData, searchAmount, display_cb) {
 console.log(gapi)
 return gapi.client.youtube.search.list({
   "part": "snippet",
   "q": searchLinkData,
   "type": "channel",
   "maxResults": searchAmount
  }, )
  .then(function(response) {
    // Handle the results here (response.result has the parsed body).
    console.log("Response", response);
    channelsData = [];
    //ChannelData input

    for (let i = 0; i < response.result.pageInfo.resultsPerPage; i++) {
     console.log("this");
     channelData = {
      "id": i,
      "channelId": response.result.items[i].snippet.channelId,
      "channelLink": "http://www.youtube.com/channel/" + response.result.items[i].snippet.channelId,
      "title": response.result.items[i].snippet.title,
      "description": response.result.items[i].snippet.description,
     };

     console.log(channelData);

     channelsData.push(channelData);
     JSON.stringify(channelsData);
     console.log(channelsData);

     display_cb(channelsData);

    }
   },
   function(err) {
    console.error("Execute error", err);
    window.alert("Please log in first");
   });
}
