//this send a post req to server and recive a json with a link
//this function returns that link 
function get_link() {
  var message = document.getElementById("id_message").value;
  var key_word = document.getElementById("id_key_word").value;
  var expires = document.getElementById("id_expire_date").value;

  var req_json = {
    "message": message,
    "key_word": key_word,
    "expires": expires, 
  };

  var res_json = "";

  fetch("https://localhost/api/api.php", {
    method: "POST", 
    body: JSON.stringify(req_json)
  }).then(res => {
    if (res.status === 200) {
      return res.json()
    } else {
        console.log("Status: " + res.status)
        return Promise.reject("server")
    };
  }).then(data_json => {
    console.log(data_json);
    res_json = data_json;
    var link = build_link(res_json.Link);
    //this is the link to share
    document.getElementById("id_link").value = link;
  }).catch(err => {
    if (err === "server") return
    console.log(err)
  });
}

function build_link(_link) {
  const route = "https://localhost/api/api.php/?link=";
  var link = route + _link;
  return link;
}