

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

$(document).ready(function () {
    toonLijst();


    let ID_Profile = getCookie("ID_Profile");
    console.log(ID_Profile);
  if (ID_Profile == ID_Profile && ID_Profile != ""){
      let removeclass = document.getElementById("toevoegmodal");
      removeclass.classList.remove("d-none");
      console.log("cum?");
  }
  

    $("#verwijder-close").on('click', () => {
        $('#verwijderModal').modal('hide');
    });


    console.log("test");
    $("#aanpasForm").submit((e) => {
        e.preventDefault();
        
        var info = $("#aanpasForm").serialize();
    $.ajax({
        url:"update.php",
        type:"POST",
        cache:false,
        data: {info}
    })
        .done((info) => {
            if (info == 1 ){
                
                
                $("#hierinfo").fadeOut(800, () => {
                    $.ajax({
                        type: "GET",
                        url: "uitlees.php",
                        dataType: "JSON"
                        }).done(function (info) {
                            var output = "<ul>";
                            for (var i in info) {
                                let idp = info[i].ID_Profile;
                                output += "<li>" + info[i].ID_Profile + "<br> ";
                                output += '<td>' + info[i].vraag + '<br></td>';
                                output += '<td><button type="button" class="btn btn-primary" data-id="' + info[i].id + '" data-gender="' + info[i].gender + '" data-first_name="' + info[i].first_name + '" data-last_name="' + info[i].last_name + '" data-birth_date="' + info[i].birth_date + '" data-member_since="' + info[i].member_since + '" data-toggle="modal" data-target="#pasaanModal" id="pasaanKnop">Pasaan</button></td>';
                                if(idp == ID_Profile && ID_Profile != "") {
                                    console.log(idp);
                                output += '<td><button type="button" class="btn btn-danger" data-id="' + info[i].id + '" data-first_name="' + info[i].first_name + '" data-last_name="' + info[i].last_name + '" data-member_since="' + info[i].member_since + '" data-toggle="modal" data-target="#verwijderModal" id="verwijderKnop">Verwijder</button></td>';
                                }
                                output += "</li>";
                            }
                            output += "</ul>";
                            $("#hierinfo").html(output).fadeIn().delay(2000);

                    });
                });
               
                
              
            } else {
                alert("Something went wrong god damm");
            }
        });
    

        
        
    });
console.log("test");
    $("#makeForm").submit((e) => {
   
        e.preventDefault();
        var info = $("#makeForm").serialize();

    $.ajax({
        url:"make.php",
        type:"POST",
        cache:false,
        data: {info}
    })
        .done((info) => {
            if (info == 1 ){
                
                
                $("#hierinfo").fadeOut(800, () => {
                    $.ajax({
                        type: "GET",
                        url: "uitlees.php",
                        dataType: "JSON"
                        }).done(function (info) {
                            var output = "<ul>";
                            for (var i in info) {
                                let idp = info[i].ID_Profile;
                                output += "<li>" + info[i].ID_Profile + "<br> ";
                                output += '<td>' + info[i].vraag + '<br></td>';
                                
                                output += '<td><button type="button" class="btn btn-primary" data-id="' + info[i].id + '" data-gender="' + info[i].gender + '" data-first_name="' + info[i].first_name + '" data-last_name="' + info[i].last_name + '" data-birth_date="' + info[i].birth_date + '" data-member_since="' + info[i].member_since + '" data-toggle="modal" data-target="#pasaanModal" id="pasaanKnop">Pasaan</button></td>';
                                let ID_Profile = getCookie("ID_Profile");
                                if(idp == ID_Profile && ID_Profile != "") {
                                    console.log(idp);
                                output += '<td><button type="button" class="btn btn-danger" data-id="' + info[i].id + '" data-first_name="' + info[i].first_name + '" data-last_name="' + info[i].last_name + '" data-member_since="' + info[i].member_since + '" data-toggle="modal" data-target="#verwijderModal" id="verwijderKnop">Verwijder</button></td>';
                                }
                                output += "</li>";
                            }
                            output += "</ul>";
                            $("#hierinfo").html(output).fadeIn().delay(2000);
                            console.log("test?");
                    });
                });
               
              
            } else {
                alert("Something went wrong god damm");
            }
        });
    

    });

    $("#verwijderForm").submit((e) => {
     
        e.preventDefault();
        var info = $("#verwijderForm").serialize();
        console.log(info);
        console.log("test");
    $.ajax({
        url:"verwijder.php",
        method: "POST",
        cache: false,
        data: {info}
    })
        .done((info) => {
            if (info == 1){
                $("#verwijderModal").modal('hide');
                toonLijst(); 
                console.log(info);
            } else {
                alert("error1");
                console.log(info);
            }
        });
    


    });


    
});


function updateLijst() {
    
    $("#hierinfo").fadeOut(800, () => {
        $.ajax({
            type: "GET",
            url: "uitlees.php",
            dataType: "JSON"
            }).done(function (data) {
                var output = "<tr>";
               
                for (var i in data) {
                    let idp = data[i].ID_Profile;
                    output;
                    output += '<td scope="col">' + data[i].ID_profile + '<br></td>';
                    output += '<td>' + data[i].vraag + '<br></td>';
                    output += '<td><button type="button" class="btn btn-primary" data-id="' + data[i].id + '" data-vraag="' + data[i].vraag + '" data-first_name="' + data[i].first_name + '" data-last_name="' + data[i].last_name + '" data-member_since="' + data[i].member_since + '" data-toggle="modal" data-target="#pasaanModal" id="pasaanKnop">Pasaan</button></td>';
                    let ID_Profile = getCookie("ID_Profile");
                    if(idp == ID_Profile && ID_Profile != "") {
                        console.log(idp);
                    output += '<td><button type="button" class="btn btn-danger" data-id="' + data[i].id + '" data-first_name="' + data[i].first_name + '" data-last_name="' + data[i].last_name + '" data-member_since="' + data[i].member_since + '" data-toggle="modal" data-target="#verwijderModal" id="verwijderKnop">Verwijder</button></td>';
                }
                    output += "</tr>"
                }
                $("#hierinfo").html(output).fadeIn().delay(2000);
        });
    });
}

function toonLijst()

{
    $.getJSON("uitlees.php")
        .done(function (data) {
            var output = "<ul>";
            for (var i in data) {
                let idp = data[i].ID_Profile;
                output;
                output += '<td scope="col">' + data[i].ID_Profile + '<br></td>';
                output += '<td>' + data[i].vraag + '<br></td>';
                output += '<td><button type="button" class="btn btn-primary" data-id_profile="' + data[i].ID_Profile + '" data-id="' + data[i].ID_Vraag + '" data-vraag="' + data[i].vraag + '" data-antwoord="' + data[i].antwoord + '" data-feit="' + data[i].feit + '" data-fabel="' + data[i].fabel + '" data-toggle="modal" data-target="#pasaanModal" id="pasaanKnop">feit/fabel</button></td>';
                
                console.log($.getJSON("uitlees.php"));
                let ID_Profile = getCookie("ID_Profile");
                if(idp == ID_Profile && ID_Profile != "") {
                    console.log(idp);
                output += '<td><button type="button" class="btn btn-danger" data-id="' + data[i].id + '" data-first_name="' + data[i].first_name + '" data-last_name="' + data[i].last_name + '" data-member_since="' + data[i].member_since + '" data-toggle="modal" data-target="#verwijderModal" id="verwijderKnop">verwijder de feit/fabel</button></td>';
            }

                output += "</tr>"
            }
            output += "</ul>";
            $("#hierinfo").html(output);
        });
}



$(document).on('click', '#verwijderKnop', function () {
    // Lees alle variabelen uit
    
    var id = $(this).data('id');
    var first_name = $(this).data('first_name');
    var last_name = $(this).data('last_name');
    var member_since = $(this).data('member_since');
    
    // logged alle variabelen
    console.log($(this).data());
    console.log("id = " + id);
    console.log("first_name = " + first_name);
    console.log("last_name = " + last_name);
    console.log("member_since = " + member_since);

    //Hier komt de rest van de aanpasfunctie
    $("#verwijderInfo").html("ID = " + id);
    $("#verwijderForm #id").val(id);

    // Voert alle variabelen in de form 
    $("#verwijderForm #name").html(first_name + " " + last_name);
    $("#verwijderForm #member_since").html(member_since);
    
});



$(document).on('click', '#pasaanKnop', function () {
    // Lees het id uit de geklikte knop

    // Maakt alle gegevens aan
    var ID_Profile = $(this).data('id_profile');
    var vraag = $(this).data('vraag');
    var antwoord = $(this).data('antwoord');
    var feit = $(this).data('feit');
    var fabel = $(this).data('fabel');
   

    //logged alle gegevens
    console.log("id_profile =" + ID_Profile);
    console.log("vraag = " + vraag);
    console.log("antwoord = " + antwoord);
    console.log("feit = " + feit);
    console.log("fabel = " + fabel);
   
    // $("#aanpasInfo").html("ID = " + id);
    // $("#aanpasForm  #id").val(id);
    
    if (feit == "feit"){
        $("#aanpasForm #feit").prop('checked',true);
    } else {
        $("#aanpasForm #fabel").prop('checked', true);
        console.log(feit);
    }
    
    $("#aanpasForm  #vraag").val(vraag);
    $("#aanpasForm  #ID_Profile").val(ID_Profile);
    // $("#aanpasForm  #last_name").val(last_name);
    // $("#aanpasForm  #birth_date").val(birth_date);
    // $("#aanpasForm  #member_since").val(member_since);
   
    // $("#editSubmit").attr("data-id", id);
    // $("#editSubmit").attr("data-gender", gender);
    // $("#editSubmit").attr("data-first_name", first_name);
    // $("#editSubmit").attr("data-last_name", last_name);
    // $("#editSubmit").attr("data-birth_date", birth_date);
    // $("#editSubmit").attr("data-member_since", member_since);
        
// });



  function update_AanpasForm() {
    if ($("#aanpasForm #antwoord").prop('checked', true)){
        $("#editSubmit").attr("data-antwoord", "FEIT");
        console.log('FEIT');
    } else {
        $("#editSubmit").attr("data-antwoord", "FABEL");
        console.log('FABEL');
    }


    
};


});
