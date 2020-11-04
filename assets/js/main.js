var serverUrl="http://localhost/furnitureShop/";
var adresa=window.location.href;

window.onload = function(){
    if(document.getElementById("signup")!=null)
    document.getElementById("signup").addEventListener("click",showRegisterForm);

    var sliderIndex = ['slider3.jpg', 'slider2.jpg', 'slider4.jpg'];

}
$(document).ready(function(){
    $("#formReg").hide();

    
});
$("#category a").click(function(e){
    e.preventDefault();
    let id=$(this).data('id');
    getArticals(id);
});
    $("#login-link").click(showLoginForm);
function showRegisterForm(){
    $("#formLog").hide();
    $("#formReg").show();
}

function showLoginForm(){
    $("#formReg").hide();
    $("#formLog").show();
}
getArticals(false);

$(".deleteArical").click(deleteArtical);
function getArticals(idKat){
    let url=serverUrl+"modules/getArticals.php";
    if(idKat)
    url+="?idCat="+idKat;
//   console.log(url);
   
     $.ajax({
          
            url:url,
            type:"GET",
            dataType:"json",
            success:function(data){
                // console.log("sjdhskdj");
                // console.log(data);
                prikazSvihProizvoda(data);
            },
            error:function(xhr,error,status){
                //alert("greska");
                console.log(xhr);
                console.log(error);
                console.log(status);
            }
        });
}
function prikazSvihProizvoda(data){
    let ispis="";
    // console.log(data);
    for(let d of data){
        ispis+=`
        <div class="col-md-4 padd">
        <div class="row">
            <div class="col-md-12">
                <img src="assets/img/${d.src}" alt="${d.title}" class="img-fluid"/>
            </div>
            <div class="col-md-12 center">
                <p>${d.title}</p>
            </div>
            <div class="col-md-12 center">
                <p class="bold">$${d.price}</p>
            </div>
            <div class="col-sm-12 center">
                <button data-id="${d.idArtical} "class="btnAddToCart btn btn-light">ADD TO CART</button>
            </div>
        </div>
    </div>
        `;
    }
    
    if(document.getElementById("products")!=null)
    document.getElementById("products").innerHTML=ispis;
   $(".btnAddToCart").click(addToCart);
}

function addToCart(){
    var izabraniProizvod=$(this).data('id');
    alert(izabraniProizvod);
    var url=serverUrl+"modules/addToCart.php?idArtical="+izabraniProizvod;
    $.ajax({
        url:url,
        success:function(data){
            alert(data);
            //console.log(data);
        },
        error:function(error,xhr,status){
            console.log(error);
        }
    });
}

function prikazi(){
    var url=serverUrl+"modules/cartProducts.php"
    $.ajax({
        url:url,
        method:"GET",
        success:function(data){
            console.log(JSON.parse(data));
            prikaziProizvodeUKorpi(JSON.parse(data));
        }
    });
}

function prikaziProizvodeUKorpi(data){
    let ispis="";
    for(let d of data){
        ispis+=`
            <div class=" col-md-3 col-sm-12 articalCart paddBottom alignerh" id="${d.idArtical}">
                <div class="slika col-lg-12 center">
                    <img src="assets/img/${d.src}" alt="${d.title}" class="product-img img-fluid"/>
                </div>
                <p class="title center">${d.title}</p>
                <p class="price center">$${d.price}</p>
                <button data-id="${d.idArtical}" class="btnRemoveCart btn btn-light">Remove</button>
            </div>
        `
    }
    document.getElementById("korpa").innerHTML=ispis;
    $(".btnRemoveCart").click(removeFromCart);

}

function removeFromCart(){
    
    var izabrani=$(this).data('id');
    //alert(izabrani);
    var url=serverUrl+"modules/cartProducts.php?idArtical="+izabrani;
    $.ajax({
        url:url,
        method:"GET",
        success:function(data){
            //console.log(JSON.parse(data));
            $("#"+izabrani).remove();
        }
    });
}
//delete admin
function deleteArtical(){
    var id=$(this).data('id');
    //alert(id);
    $.ajax({
        method:"POST",
        url:"modules/deleteArtical.php",
        dataType:"json",
        data:{
            id:id
        },
        success:function(data){
            alert("Deleted successfully!");
            $("#"+id).remove();
        },
        error(xhr,statusT,error){
            var status=xhr.status;
            switch(status){
                case 500: alert("Greska na serveru");
                break;
                case 404: alert("stranica nije pronadjena");
                break;
                default: alert("Greska"+status+"-"+statusT);
                break;
            }
        }
    })
}
//check login
function checkLogin(){
    let mail=document.getElementById("mail").value;
    let pass=document.getElementById("pass").value;

    let reMail=/^[a-z]{2,}[\.\$\%\!\?\.\#\^\\\/]*[A-z0-9]*[\.\$\%\!\?\.\#\^\\\/]*[A-z0-9]*[@][a-z]{2,}\.[a-z]{2,}$/;
    let rePas=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    let result=true;
    if (!reMail.test(mail)) {
		
        document.getElementById("error-login1").innerHTML="Wrong username or password.";	
        result=false;
	}
	else{
		
        document.getElementById("error-login1").innerHTML="";  
    }
    if (!rePas.test(pass)) {
		
        document.getElementById("error-login1").innerHTML="Wrong username or password.";	
        result=false;
	}
	else{
		
        document.getElementById("error-login1").innerHTML="";  
    }
    // console.log(result);
    return result;


}

//provera register
function checkRegister(){
    var firstName=$("#firstName").val();
    var lastName=$("#lastName").val();
    var email=$("#email").val();
    var password=$("#password").val();
   
    var reFirstName=/^[A-Z][a-z]{2,}$/;
    var reLastName=/^[A-Z][a-z]{2,}$/;
    var reEmail=/^[a-z]{2,}[\.\$\%\!\?\.\#\^\\\/]*[A-z0-9]*[\.\$\%\!\?\.\#\^\\\/]*[A-z0-9]*[@][a-z]{2,}\.[a-z]{2,}$/;
        var rePassword=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
   
    
        var result=true;
        if(!reFirstName.test(firstName)){
           $("#errorReg-firstName").html("First name must start with capital letter and have at least 2 characters.");
           result=false;
        }
        else{
           $("#errorReg-firstName").html("");
           
        }

        if(!reLastName.test(lastName)){
            $("#errorReg-lastName").html("Incorrect format for last name.");
            result=false;
         }
         else{
            $("#errorReg-lastName").html("");
            
         }
   
        if(!reEmail.test(email)){
           $("#errorReg-mail").html("Incorrect format of email.");
 
           result=false;
        }
        else{
           $("#errorReg-mail").html("");
           
        }
   
        if(!rePassword.test(password)){
           $("#errorReg-pass").html("Incorrect format of password");
           result=false;
        }
        else{
           $("#errorReg-pass").html("");
           
        }

        return result;
}

//provera contactForm-e
function contactForm(){
    var subject = document.getElementById("subject").value;
    var email = document.getElementById("contactEmail").value;
    var formMessage=document.getElementById("contactTextarea").value;
    var reEmail = /^[a-z]{2,}[\.\$\%\!\?\.\#\^\\\/]*[A-z0-9]*[\.\$\%\!\?\.\#\^\\\/]*[A-z0-9]*[@][a-z]{2,}\.[a-z]{2,}$/;
    var reFormSubject=/^[A-Z][a-z]{2,}+$/;
    var checkData = false;

    if(subject==""){
        document.getElementById("errorSubject").innerHTML="Subject field must not be empty!";
    }
    else if(!reFormSubject.test(subject)){
        document.getElementById("errorSubject").innerHTML = "Incorrect format for subject.";
    }else{
        document.getElementById("errorSubject").innerHTML="";
    }
    if(email==""){
        document.getElementById("errorEmail").innerHTML="Email field must not be empty!"
    }
    else if(!reEmail.test(email)){
        document.getElementById("errorEmail").innerHTML="Incorrrect form";
        flag=false;
    }
    else{
        document.getElementById("errorEmail").innerHTML=""
    }
   
    if(formMessage.length<=0){
        document.getElementById("errorMessage").innerHTML="Message can't be empty";
    }
    else{
        document.getElementById("errorMessage").innerHTML=""
    }
    
    console.log(checkData);
    return checkData;


}


//provera za update
function proveriPodatke(){
    // alert("lsdjfls");
     var name=document.getElementById('name').value;
     var price=document.getElementById('price').value;
     var catList=document.getElementById("ddlCat");
     var img=document.getElementById("pic").value;
     console.log(img);
    
    
     var selectedCat=catList.options[catList.selectedIndex].value;
     console.log(selectedCat);
     
     var reName=/^[A-Z][a-z]{2,}(\s[A-Z][a-z]{1,})*$/;
     var rePrice=/^[1-9][0-9]*$/;
     var rePic=/^[^\s]+\.(jpg|png|gif|jpeg)$/;
 
     var flag =true;
     if(img.length==0){
         flag=true;
     }
 
     if(!rePic.test(img) && img.length>0){
         document.getElementById("error-pic").innerHTML="You can uploda just a photo";
         flag=false;
     }
     if (!reName.test(name) || name.length==0) {
         
         document.getElementById("error-name").innerHTML="please retry with a correct format";	
         flag=false;
     }
     else{
         
         document.getElementById("error-name").innerHTML="";
         
     }
 
     if (!rePrice.test(price) || price.length==0) {
         
         document.getElementById("error-price").innerHTML="price can't be zero or less";
         flag=false;
     }
     else{
         
         document.getElementById("error-price").innerHTML="";
        
     }
     
 
     if (selectedCat=="Select") {
         document.getElementById("error-cat").innerHTML="please select categoty";
         flag=false;
     }
     else{
         document.getElementById("error-cat").innerHTML=""
         
     }
 
     console.log(flag);
     return flag;
     
     
 }

 
function proveriPodatkeInsert(){
    // alert("lsdjfls");
     var name=document.getElementById('newName').value;
     var price=document.getElementById('newPrice').value;
     var catList=document.getElementById("newDdlCat");
     var img=document.getElementById("newPic").value;

     console.log(img);
    
    
     var selectedCat=catList.options[catList.selectedIndex].value;
     console.log(selectedCat);
     
     var reName=/^[A-Z][a-z]{2,}(\s[A-Z][a-z]{1,})*$/;
     var rePrice=/^[1-9][0-9]*$/;
     var rePic=/^[^\s]+\.(jpg|png|gif|jpeg)$/;
 
     var flag =true;
     
     if(!rePic.test(img)){
         document.getElementById("errorIn-pic").innerHTML="You must uploda a photo";
         flag=false;
     }
     if (!reName.test(name) || name.length==0) {
         
         document.getElementById("errorIn-name").innerHTML="please retry with a correct format";	
         flag=false;
     }
     else{
         
         document.getElementById("errorIn-name").innerHTML="";
         
     }
 
     if (!rePrice.test(price) || price.length==0) {
         
         document.getElementById("errorIn-price").innerHTML="price can't be zero or less";
         flag=false;
     }
     else{
         
         document.getElementById("errorIn-price").innerHTML="";
        
     }
     
 
     if (selectedCat=="Select") {
         document.getElementById("errorIn-cat").innerHTML="please select categoty";
         flag=false;
     }
     else{
         document.getElementById("errorIn-cat").innerHTML=""
         
     }
 
     console.log(flag);
     return flag;
     
     
 }

 

//  headers: { 'Access-Control-Allow-Origin': 'http://furnituredotcom.epizy.com/modules/getArticals.php' },
