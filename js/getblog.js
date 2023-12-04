// Blog Description
function showBlogD(param1){
    //   var valu= window.localStorage.getItem("inputValue");
      var url = 'api/fetch.php?id='+ param1;
    fetch(url)
    .then((response)=> response.json())
    .then((data)=>
    {
        var clie = '';
        for(var i in data){
            clie += `
            <div class="backg-image p-2 text-center mb-3 text-white">
                <img src="admin/admin_images/${data[i].blog_img}">
            </div>

            <div class="blog-desc mt-5">
                <h1><b>${data[i].blog_title}</b></h1>
                <p>${data[i].blog_desc}</p>
            </div>`
        }
        
        bdesc.innerHTML= clie;
      
    })
}
showBlogD();

