


  var firebaseConfig = {
    apiKey: "AIzaSyAwtDS--GhJ75BGikw11UJdzLN5l0QtTLY",
    authDomain: "pickadova.firebaseapp.com",
    databaseURL: "https://pickadova.firebaseio.com/",
    projectId: "pickadova",
    storageBucket: "",
    messagingSenderId: "481153545905",
    appId: "1:481153545905:web:2b5642305c86c761cd5490",
    measurementId: "G-EM5YDSLS7H"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

var database = firebase.database();
var storage = firebase.storage();
  
  /************INSERT FUNCTIONS*****************/
  function writeUserData1(userId, name) {
  firebase.database().ref('users/' + userId).set({
    username: name
   });
}
  function writeUserData(user1, user2, message, type) {
  
  var currentdate = new Date(); 
  var date =  currentdate.getDate() + "/" + (currentdate.getMonth()+1)  + "/"+ currentdate.getFullYear().toString().substr(-2);
  //var time =  currentdate.getHours() + ":"+ currentdate.getMinutes() + ":"+ currentdate.getSeconds();
    
  var hh = currentdate.getHours();
  var min = currentdate.getMinutes();

  var ampm = (hh>=12)?'pm':'am';
  hh = hh%12;
  hh = hh?hh:12;
  hh = hh<10?'0'+hh:hh;
  min = min<10?'0'+min:min;

  var time = hh+" : "+min+" "+ampm;

  var ref_message=firebase.database().ref('message/');
  var ref_recent=firebase.database().ref('recent/');
  var msg_id=ref_message.push().getKey();
  ref_message.child(user1).child(user2).child(msg_id).set({
  message: message,
  type: type,
  date: date,
  time: time,
  sender_id: user1,
  seen:'false',
    });
  ref_message.child(user2).child(user1).child(msg_id).set({
  message: message,
  type: type,
  date: date,
  time: time,
  sender_id: user1,
  seen:'false',
    });



  ref_recent.child(user1).child(user2).set({
  name: "name2",
  user_id: user2,
  count: 0,
    });

 ref_recent.child(user2).child(user1).once('value',(snapshot)=>
          {
           var rec_data = snapshot.val();
            if(rec_data){

            var  count = rec_data.count + 1;

            }else{
            var  count =  1;
            }

             ref_recent.child(user2).child(user1).set({
                  name: "name1",
                  user_id: user1,
                  count:count,
                    });
          });
  
 
}