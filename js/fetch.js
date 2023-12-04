


//footer contact info
function showDcon(){
    var url = 'api/fetch.php/url?conn';
    fetch(url)
    .then((response)=> response.json())
    .then((data)=>
    {
        var clie = '';
        for(var i in data){
            clie += `<h5 class=" mb-4">Contact</h5>
            <p class="mb-2 text-dark"><i class="fa fa-map-marker-alt"></i> &nbsp; ${data[i].location} </p>
            <p class="mb-2 text-dark"><i class="fa fa-phone-alt"></i>&nbsp; ${data[i].numb}</p>
            <p class="mb-2 text-dark"><i class="fa fa-envelope"></i> &nbsp; ${data[i].maill}</p>
            <div class="d-flex pt-2">
                <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/profile.php?id=100063535842460"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/joonelicompany/"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/jooneli-inc-b49503153/"><i class="fab fa-linkedin"></i></a>
            </div>
    `
        }
        dcontact.innerHTML= clie;
    })
}
showDcon();














