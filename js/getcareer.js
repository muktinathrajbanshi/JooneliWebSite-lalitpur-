
function showCare(para){
      var url = 'api/fetch.php?j_id='+ para;

    fetch(url)
    .then((response)=> response.json())
    .then((data)=>
    {
        var clie = '';
        for(var i in data){
            clie += `
            <div class="d-flex align-items-center mb-5">
                <div class="">
                    <h1 class="mb-3"><b>${data[i].position}(${data[i].opening})</b> </h1>
                    <span class="text-truncate me-3"><i class="far fa-clock  me-2"></i>${data[i].time}</span>
                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt  me-2"></i>${data[i].salary}</span>
                </div>
            </div>
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
    

                    <div class="mb-5">
                        <h4 class="mb-3">Key Responsibilities</h4>
                        <p>${data[i].responsible}</p>                        
                        <h4 class="mb-3">Qualifications</h4>
                        <p>${data[i].qualification}</p>
                        
                    </div>


                </div>

                <div class="col-lg-4">
                    <div class="rounded jsummary p-5 mb-4 " >
                        <h4 class="mb-4">Job Summary</h4>
                        <p><i class="fa fa-angle-right  me-2"></i><b>Vacancy:</b> ${data[i].position}(${data[i].opening})</p>
                        <p><i class="fa fa-angle-right  me-2"></i><b>Job Nature: </b> ${data[i].time}</p>
                        <p><i class="fa fa-angle-right  me-2"></i><b>Salary:</b> ${data[i].salary}</p>
                        <p class="m-0"><i class="fa fa-angle-right  me-2"></i><b>Deadline:</b> ${data[i].deadline}</p>
                    </div>
                </div>
            </div>`
        }
    console.log(clie);
        jdesc.innerHTML= clie;
    })
}
showCare();