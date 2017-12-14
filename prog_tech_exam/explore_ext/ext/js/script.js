$(document).ready(function (){
    var url = "http://localhost/explore_ext/API/explore_california_api.php/tours/";
    
    $.get(url, function(data){
    //parse JSON data
        var tourData = JSON.parse(data);
    //create table with JSON data extract
        var table = "<table class='table'>";
        table += "<thead>";
        table += "<tr>";
        table += "<th>Tour ID</th>";
        table += "<th>Package ID</th>";
        table += "<th>Tour Name</th>";
        table += "<th>Blurb</th>";
        table += "<th>Description</th>";
        table += "<th>Price</th>";
        table += "<th>Difficulty</th>";
        table += "<th>Graphic</th>";
        table += "<th>Length</th>";
        table += "<th>Region</th>";
        table += "<th>Keywords</th>";
        table += "</tr>";
        table += "</thead>";

        table += "<tbody>";
        
        for(var i = 0; i < tourData.length; i++){
             table += "<tr>";
            table += "<td>" + tourData[i].tourId + "</td>";
            table += "<td>" + tourData[i].packageId + "</td>";
            table += "<td>" + tourData[i].tourName + "</td>";
            table += "<td>" + tourData[i].blurb + "</td>";
            table += "<td>" + tourData[i].description + "</td>";
            table += "<td>" + tourData[i].price + "</td>";
            table += "<td>" + tourData[i].difficulty + "</td>";
            table += "<td><img src='" + chrome.extension.getURL("/images/" + tourData[i].graphic) + "' alt='" + tourData[i].graphic + "' >" + "</td>";
            table += "<td>" + tourData[i].length + "</td>";
            table += "<td>" + tourData[i].region + "</td>";
            table += "<td>" + tourData[i].keywords + "</td>";
               table += "<tr>";
            }

        table += "</tbody>";
        table +="</table>";
    //append table to html by DOM manipulation
        $('#table').append(table);
    });
});