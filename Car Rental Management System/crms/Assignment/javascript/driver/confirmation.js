//Stores the file path of the HTML docmument
const FILE_PATH_= "driver/index/registration/confirmation"

let confirmation = document.getElementById('License-Number')
 
window.addEventListener('beforeunload', function(){
    clearData();
})

window.addEventListener('load', function(){
    
    checkCaller()
    checkConfirmationData()
    loadConfirmationData()

    //Stores current location in the wedsite directory in sessionStorage
    //Updates the location in the wedsite directory in sessionStorage to the current location using a JSON objet
    if(sessionStorage.getItem("path")){

        let path = JSON.parse(sessionStorage.getItem("path"))
        path.path = FILE_PATH_
        sessionStorage.setItem("path", JSON.stringify(path))
    }

    //Creates and adds the current location in the wedsite directory to sessionStorage using a JSON object
    if(!sessionStorage.getItem("path")){
        
        let path ={
            "path" : FILE_PATH_
        }
        sessionStorage.setItem("path",JSON.stringify(path))
    }
})

function checkConfirmationData(){

    if(!sessionStorage.getItem('driver')){
        console('Confirmation data could not be found!')
        //window.open('../../php/driver/index.php',"_self")
    }
    else{
        return
    }
}

function loadConfirmationData(){
    let driver = JSON.parse(sessionStorage.getItem('driver'))
    let text = 'Please record the information to access your account:\n\n'+'Licence No: '+ driver.licenseNo + '\nPassword: ' + driver.password
    confirmation.value = text
}

function clearData(){
    if(!sessionStorage.getItem('driver')){
        return
    }
    if(sessionStorage.getItem('driver')){
        sessionStorage.removeItem('driver')
    }
}

//Checks path of the previous webpage that open the confirmation webpage and validates if the caller is correct
function checkCaller(){

    console.log("Hey")
    //Checks the previous webpage path to determine if access can be granted 
    if(sessionStorage.getItem("path")){

        let path = JSON.parse(sessionStorage.getItem("path"))

        if(!(path.path == "driver/index/registration"))
        {
            window.open('../../php/driver/registration.php', "_self")
            console.log(path.path)
        }

    }
    if(!sessionStorage.getItem("path")){
        let path = {
            "path" : "driver/index/registration"
        }
        sessionStorage.setItem("path", JSON.stringify(path))
        console.log(path.path)
        window.open('../../php/driver/registration.php',"_self")
    }
}