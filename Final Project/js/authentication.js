function checkPassword(){
    var credentials=document.getElementsByClassName('label-input100');
    if (credentials[3].value===credentials[4].value){
        credentials[3].innerHTML="Password Doesnot Match";
    }
}