var client1;
var client2;





function startConnect2() {
    clientID = "client_ind" + parseInt(Math.random() * 100);
    host = "aliwafa.id";
    port = "9001";

    client2 = new Paho.MQTT.Client(host, Number(port), clientID);

    client2.onConnectionLost = onConnectionLost;
    client2.onMessageArrived = onMessageArrived;

    // Connect the client, if successful, call onConnect function
    client2.connect({
        onSuccess: onConnect2,
        userName: 'ali',
        password: '1234'
    });

}

function startConnect1() {
    clientID = "client_ind" + parseInt(Math.random() * 100);
    host = "iot.intek.co.id";
    port = "9001";

    client1 = new Paho.MQTT.Client(host, Number(port), clientID);

    client1.onConnectionLost = onConnectionLost;
    client1.onMessageArrived = onMessageArrived;

    // Connect the client, if successful, call onConnect function
    client1.connect({
        onSuccess: onConnect,
        userName: 'ali',
        password: '1234'
    });

}

function onConnect2() {
    topic = "/Cikunir";
    client2.subscribe("lt2/suhu2/sharp")
    client2.subscribe("cmnd/Main_4")

}

// Called when the client connects
function onConnect() {
    topic = "/tele";
    client1.subscribe("cmnd/lampu_solder/power")


}

// Called when the client loses its connection
function onConnectionLost(responseObject) {
    document.getElementById("messages").innerHTML = '<span>ERROR: Connection lost</span><br/>';
    console.log("ERROR")
    if (responseObject.errorCode !== 0) {
        console.log("error")
    }
}

function onMessageArrived(message) {
    console.log("onMessageArrived: " + message.payloadString);
    console.log("topic: " + message.destinationName);

    if (message.destinationName == "cmnd/lampu_solder/power") {
        console.log("data lampu masuk")
        let data = message.payloadString;
        if (data == 1) {
            window.localStorage.setItem('lampu_solder', 'menyala');
        } else {
            window.localStorage.setItem('lampu_solder', 'mati');
        }
    }
}








let ckbox = document.querySelector('#chbox')
let ckboxac = document.querySelector('#chboxac')
let cksteker = document.querySelector("#stekerslider")





if (localStorage.getItem('lampu_solder') == "menyala") {
    ckbox.checked = true
    $('#lampusoldericon').removeClass('text-blue-500')
    $('#lampusoldericon').addClass('text-yellow-500')
    $('#lampusoldericon').addClass('animate-pulse')

} else {
    ckbox.checked = false
    $('#lampusoldericon').removeClass('text-yellow-500')
    $('#lampusoldericon').addClass('text-blue-500')
    $('#lampusoldericon').removeClass('animate-pulse')
}


if (localStorage.getItem('ac') == "menyala") {
    ckboxac.checked = true
    $('#acicon').removeClass('text-blue-500')
    $('#acicon').addClass('text-yellow-500')
    $('#acicon').addClass('animate-spin')

} else {
    ckboxac.checked = false
    $('#acicon').removeClass('text-yellow-500')
    $('#acicon').addClass('text-blue-500')
    $('#acicon').removeClass('animate-spin')
}

let choseeSteker = $("#pilihsteker");


$("#pilihsteker").on("change", function() {
    cksteker.addEventListener('change', () => {
        if (cksteker.checked) {
            if ($("#pilihsteker").val() == "power-4") {
                message = new Paho.MQTT.Message("1");
                message.destinationName = "cmnd/Main_4/POWER4";
                client2.send(message)
            } else if ($("#pilihsteker").val() == "power-2") {
                message = new Paho.MQTT.Message("1");
                message.destinationName = "cmnd/Main_4/POWER2";
                client2.send(message)
            } else {
                message = new Paho.MQTT.Message("1");
                message.destinationName = "cmnd/Main_4/POWER4";
                client2.send(message)
                message = new Paho.MQTT.Message("1");
                message.destinationName = "cmnd/Main_4/POWER2";
                client2.send(message)
            }
        } else {
            if ($("#pilihsteker").val() == "power-4") {
                message = new Paho.MQTT.Message("0");
                message.destinationName = "cmnd/Main_4/POWER4";
                client2.send(message)
            } else if ($("#pilihsteker").val() == "power-2") {
                message = new Paho.MQTT.Message("0");
                message.destinationName = "cmnd/Main_4/POWER2";
                client2.send(message)
            } else {
                message1 = new Paho.MQTT.Message("0");
                message2 = new Paho.MQTT.Message("0");
                message1.destinationName = "cmnd/Main_4/POWER2";
                message2.destinationName = "cmnd/Main_4/POWER4";
                client2.send(message1)
                client2.send(message2)
            }
        }
    })




});




ckbox.addEventListener('change', () => {
    if (ckbox.checked) {
        message = new Paho.MQTT.Message("1");
        message.destinationName = "cmnd/lampu_solder/power";
        client1.send(message);
        console.log(message.payloadString)
        console.log("Ke cek bro")
        $('#lampusoldericon').removeClass('text-blue-500')
        $('#lampusoldericon').addClass('text-yellow-500')
        $('#lampusoldericon').addClass('animate-pulse')
        window.localStorage.setItem('lampu_solder', 'menyala');

    } else {
        message = new Paho.MQTT.Message("0");
        message.destinationName = "cmnd/lampu_solder/power";
        client1.send(message);
        console.log("ga cek kok")
        $('#lampusoldericon').removeClass('text-yellow-500')
        $('#lampusoldericon').addClass('text-blue-500')
        $('#lampusoldericon').removeClass('animate-pulse')
        window.localStorage.setItem('lampu_solder', 'mati');
    }
})


ckboxac.addEventListener('change', () => {
    if (ckboxac.checked) {
        message = new Paho.MQTT.Message("1");
        message.destinationName = "Cikunir/lt2/suhu2/sharp";
        client2.send(message)
        window.localStorage.setItem('ac', 'menyala');
        $('#acicon').addClass('animate-spin')
        $('#acicon').removeClass('text-blue-500')
        $('#acicon').addClass('text-yellow-500')
    } else {
        message = new Paho.MQTT.Message("2");
        message.destinationName = "Cikunir/lt2/suhu2/sharp";
        client2.send(message)
        window.localStorage.setItem('ac', 'mati');
        $('#acicon').removeClass('animate-spin')
        $('#acicon').removeClass('text-yellow-500')
        $('#acicon').addClass('text-blue-500')
    }
})
