
let driverInfo = document.getElementById('driver-info')

//Stores the file path of the HTML docmument
const FILE_PATH = "driver/index/public_console"

document.onreadystatechange = function(){

    if(document.readyState === 'complete'){

    //Stores current location in the wedsite directory in sessionStorage
    //Updates the location in the wedsite directory in sessionStorage to the current location using a JSON object
    if(sessionStorage.getItem("path")){

        let path = JSON.parse(sessionStorage.getItem("path"))
        path.path = FILE_PATH
        sessionStorage.setItem("path", JSON.stringify(path))
    }

    //Creates and adds the current location in the wedsite directory to sessionStorage using a JSON object
    if(!sessionStorage.getItem("path")){
        
        let path ={
            "path" : FILE_PATH
        }
        sessionStorage.setItem("path",JSON.stringify(path))
    }

   
        checkLoginStatus();
        loadDriverInfo();
    }
}

//Redirects thoes who have not logged in back to the login page
function checkLoginStatus(){
    
    //Checks if the login status record exists in session storage
    if(sessionStorage.getItem('LogInStatus'))
    {
        let loginStatus = JSON.parse(sessionStorage.getItem('LogInStatus'))
        
        //If the login status record is false the user is redirected back to the login page
        if(!loginStatus.isLoggedOn)
        {   
            console.log('Must be logged in order to access the public console')
            window.open('../../php/driver/index.php','_self')
            return
        }
        else{
            return
        }
    }

    //If the login status record does not exist the redirect the user back to the sign in page
    if(!sessionStorage.getItem('LogInStatus'))
    {
        console.log('Could not determine login status')
        window.open('../../php/driver/index.php','_self')
        return
    }

    // //Checks if the employee login status record exists in session storage
    // if(sessionStorage.getItem('EmployeeLogInStatus'))
    // {
    //     let loginStatus = JSON.parse(sessionStorage.getItem('EmployeeLogInStatus'))
        
    //     //If the employee login status record is false the user is redirected back to the console page
    //     if(loginStatus.isLoggedOn)
    //     {   
    //         loginStatus.isLoggedOn = false
    //         localStorage.setItem('EmployeeLogInStatus',JSON.parse(loginStatus))
    //         console.log('Must be an administrator in order to access the admin console')
    //         window.open('../../html/admin/index.html','_self')
    //         return
    //     }
    //     else{
    //         return
    //     }
    // }

    // //If the employee login status record does not exist the redirect the user back to the console in page
    // if(!sessionStorage.getItem('EmployeeLogInStatus'))
    // {
    //     console.log('Could not determine administrator login status')
    //     window.open('../../html/driver/public_console.html','_self')
    // }
}

//Dynamically loads the signed in driver's information
 
function loadDriverInfo(){
    
if(!sessionStorage.getItem("driverInfo")){

    console.log('Driver info could not be located in session Storage.')
    document.getElementById('driver-info').innerHTML += "<h3>Name: Could not be found</h3>"
    document.getElementById('driver-info').innerHTML += "<h3>License No.: Could not be found</h3>"
    window.open('../../php/driver/index.php','_self')

    return  
}

if(sessionStorage.getItem('driverInfo')){

    if(!localStorage.getItem("driverInfo")){
         
        document.getElementById('driver-info').innerHTML += "<h3>Name: Could not be found</h3>"
        document.getElementById('driver-info').innerHTML += "<h3>License No.: Could not be found</h3>"
        
        return
    }

    if(localStorage.getItem("driverInfo")){

        
        let entry = JSON.parse(sessionStorage.getItem("driverInfo"))
        let records = JSON.parse(localStorage.getItem("driverInfo"))
    

        //Seaches for record number/password pair which matches the entry

        for(i = 0 ; i < records.length; i++){
           
            //Retrieves matching record data from local storage
            if((entry.licenseNo == records[i].licenseNo) && (entry.firstName == records[i].firstName) && (entry.lastName == records[i].lastName)){
               
                
                document.getElementById('driver-info').innerHTML += "<h3>"+ "Name: "+ records[i].firstName + " "+ records[i].lastName +"</h3>"
                document.getElementById('driver-info').innerHTML += "<h3>"+ "License No: "+ records[i].licenseNo +"</h3>"
                
                return 

            }
        }
 
    }

}

}
