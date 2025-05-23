 let employeeInfo = document.getElementById('employee-info')

 //Stores the file path of the HTML document
 const FILE_PATH = "admin/index/admin_console"

//Event Listeners

document.onreadystatechange = function(){

    if(document.readyState === 'complete')
    {
        //Updates the location in the wedsite directory in sessionStorage to the current location using a JSON objet
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

        checkLoginStatus()
        loadEmployeeInfo()
    }
}

//Redirects thoes who have not logged in back to the login page
function checkLoginStatus(){

    //Checks if the login status record exists in session storage
    if(sessionStorage.getItem('EmployeeLogInStatus'))
    {
        let loginStatus = JSON.parse(sessionStorage.getItem('EmployeeLogInStatus'))
        
        //If the login status record is false the user is redirected back to the login page
        if(!loginStatus.isLoggedOn)
        {   
            console.log('Must be logged in order to access the admin console')
            window.open('../../html/admin/index.php','_self')
            return
        }
        else{
            return
        }
    }

    //If the Employee login status record does not exist the redirect the user back to the sign in page
    if(!sessionStorage.getItem('EmployeeLogInStatus'))
    {
        console.log('Could not determine login status')
        window.open('../../html/admin/index.php','_self')
    }

    //Checks if the login status record exists in session storage
    if(sessionStorage.getItem('LogInStatus'))
    {
        let loginStatus = JSON.parse(sessionStorage.getItem('LogInStatus'))
        
        //If the login status record is false the user is redirected back to the login page
        if(loginStatus.isLoggedOn)
        {   
            loginStatus.isLoggedOn = false
            localStorage.setItem('LogInStatus', JSON.parse(loginStatus))
            console.log('Must be logged as a driver in order to access the public console')
            window.open('../../html/driver/index.php','_self')
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
        window.open('../../html/admin/admin_console.php','_self')
    }
  
}

//Dynamically loads the signed in employee's information
function loadEmployeeInfo(){
   
    if(!sessionStorage.getItem("employeeinfo")){
    
        console.log('Employee info could not be located in session Storage.')
        document.getElementById('employee-info').innerHTML += "<h3>Employee: Could not be found</h3>"
        document.getElementById('employee-info').innerHTML += "<h3>Employee ID: Could not be found</h3>"
        
        window.open("../../html/admin/index.php","_self")

        return  
    }
    
    if(sessionStorage.getItem('employeeinfo')){
    
        if(!localStorage.getItem("employeeinfo")){
             
            document.getElementById('employee-info').innerHTML += "<h3>Employee: Could not be found</h3>"
            document.getElementById('employee-info').innerHTML += "<h3>Employee ID: Could not be found</h3>"
            
            return
        }
    
        if(localStorage.getItem("employeeinfo")){
    
            
            let entry = JSON.parse(sessionStorage.getItem("employeeinfo"))
            let records = JSON.parse(localStorage.getItem("employeeinfo"))
        
    
            //Seaches for record number/password pair which matches the entry
            
            for(i = 0 ; i < records.length; i++){
    
                //Retrieves matching record data from local storage
                if((entry.employeeId == records[i].employeeId) && (entry.firstName == records[i].firstName) && (entry.lastName == records[i].lastName)){
    
                    document.getElementById('employee-info').innerHTML += "<h3>"+ "Employee: "+ records[i].firstName + " "+ records[i].lastName +"</h3>"
                    document.getElementById('employee-info').innerHTML += "<h3>"+ "Employee ID: "+ records[i].employeeId +"</h3>"
                    
                    return 
    
                }
            }
     
        }
    
    }
    
}

//Clears the login attempt variable in storage
function clearAttempts(){

    if(sessionStorage.getItem("LogInAttempts")){
        sessionStorage.removeItem("LogInAttempts")
        console.log("hey")
    }  
    else{
        return
    }
}