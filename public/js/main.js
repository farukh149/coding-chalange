var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;


function sentRequests(mode) {
    ajax('/sentrequests', 'POST', '', {type:mode});
}

function getRequests(mode) {
   ajax('/recievedrequests', 'POST', '', {type:mode});
}

function getMoreRequests(mode) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnections(mode) {
  ajax('/acceptedrequests', 'POST', '', {type:mode});
}

function getMoreConnections() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnectionsInCommon(userId, connectionId) {
  // your code here...
}

function getMoreConnectionsInCommon(userId, connectionId) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getSuggestions(mode) {
   ajax('/sentrequests', 'POST', '', {type:mode});
}

function getMoreSuggestions() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function sendRequest(userId, suggestionId,$mode) {
  ajax('/createrequest', 'POST', '', {userId:userId,suggestionId:suggestionId,mode:$mode});
}

function deleteRequest(userId, requestId) {
  ajax('/deleterequest', 'POST', '', {userId:userId,requestId:requestId});
}

function acceptRequest(userId, requestId,$mode) {
  ajax('/acceptrequest', 'POST', '', {userId:userId,requestId:requestId,mode:$mode});
}

function removeConnection(userId, connectionId) {
  // your code here...
}

$(function () {
   
    
});