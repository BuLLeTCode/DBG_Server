var sendNotification = function(data) {
    var headers = {
        "Content-Type": "application/json; charset=utf-8",
        "Authorization": "Basic ZjYxYjc4NmUtNDNhOC00ODdiLWI0NGYtZjkzY2Q1MzBjMjIw"
    };

    var options = {
        host: "onesignal.com",
        port: 443,
        path: "/api/v1/notifications",
        method: "POST",
        headers: headers
    };

    var https = require('https');
    var req = https.request(options, function(res) {
        res.on('data', function(data) {
            console.log("Response:");
            console.log(JSON.parse(data));
        });
    });

    req.on('error', function(e) {
        console.log("ERROR:");
        console.log(e);
    });

    req.write(JSON.stringify(data));
    req.end();
};

var message = {
    app_id: "e0c9ffdc-adec-472b-b2e1-6b7821035f1a",
    contents: {"en": "English Message"},
    included_segments: ["All"]
};

sendNotification(message);