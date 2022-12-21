/*new product add  and submit poppup box script start*/ 
var popup=document.getElementById("popup");
function openpopup(){

   popup.classList.add("openpopup");
}

function closepopup(){

    popup.classList.remove("openpopup");
    
}
/*submit poppup box script end*/ 

/*product edit and Saved poppup box script start*/ 

var tost=document.getElementById("tot");
var progress=document.getElementById("prog");

function toastac(){

    tost.classList.add("active");
    progress.classList.add("proactive");
   
}
function closepop(){
    tost.classList.remove("active");
}

/*Saved poppup box script end*/ 

/*product delete  poppup box script start*/ 

var delpop=document.getElementById("delete-popup");

function delclick(){

    delpop.classList.add("delete-popupclick");
}
function deloutclick(){

    delpop.classList.remove("delete-popupclick");
}

/*delete poppup box script end*/ 

/*product deleted  poppup box script start*/ 



/*deleted poppup box script end*/ 

/*product image script start */

function previewbefore(id){
    document.querySelector("#"+id).addEventListener("change",function(e){
         
        if(e.target.files.length==0){
            return;
        }
        let file=e.target.files[0];
        let url=URL.createObjectURL(file);
        document.querySelector("#"+id+"-preview div").innerHTML=file.name;
        document.querySelector("#"+id+"-preview img").src=url;

        

    })
}

previewbefore("file-1");
previewbefore("file-2");
previewbefore("file-3");



/*end */

