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

function getConnections() {
  // your code here...
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

function sendRequest(userId, suggestionId) {
  ajax('/createrequest', 'POST', '', {userId:userId,suggestionId:suggestionId});
}

function deleteRequest(userId, requestId) {
  ajax('/deleterequest', 'POST', '', {userId:userId,requestId:requestId});
}

function acceptRequest(userId, requestId) {
  // your code here...
}

function removeConnection(userId, connectionId) {
  // your code here...
}

$(function () {
   
    
});