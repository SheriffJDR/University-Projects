// sort out webpage access permission
let employeeId = document.getElementsByClassName('employee-ID')[0]
let password = document.getElementsByClassName('password')[0]
message = document.getElementById('message')
let btn1 = document.getElementsByTagName('button')[0]
jsStatus = document.getElementsByTagName('input')[2]

//Stores the file path of the HTML docmument
const FILE_PATH_ADMIN = "admin/index"

//Event Listener

window.addEventListener('load', function(){

    //Updates the location in the wedsite directory in sessionStorage to the current location using a JSON objet
    if(sessionStorage.getItem("path")){

        let path = JSON.parse(sessionStorage.getItem("path"))
        path.path = FILE_PATH_ADMIN
        sessionStorage.setItem("path", JSON.stringify(path))
    }

    //Creates and adds the current location in the wedsite directory to sessionStorage using a JSON object
    if(!sessionStorage.getItem("path")){
        
        let path ={
            "path" : FILE_PATH_ADMIN
        }
        sessionStorage.setItem("path",JSON.stringify(path))
    }
})

// document.getElementsByTagName('button')[0].addEventListener('click',function(event){
    
//     submit();
//     event.stopImmediatePropagation();
// })

window.addEventListener('beforeunload', function(){

    if(sessionStorage.getItem("LogInAttempts")){
        sessionStorage.removeItem("LogInAttempts")
    }
})

btn1.addEventListener('submit',function(event){
      
    if(submit()){

       jsStatus.value = true;
       event.preventDefault();
       event.stopImmediatePropagation();
       return
    }

   
})

//Validates Employee Id input 
function checkEmployeeId(empid){
    let employeeIdString = empid

    //Checks if the string is empty 
    if(employeeIdString == ''){
        console.log('Employee ID Check Failed: Employee Id is empty.')
        
        //Displays error messages on page
        message.innerHTML = "Employee Id is empty."
        message.classList.add('red-text')

        //Changes the color of the text box if an error is detected
        if(employeeId.classList.contains('employee-ID')){
            employeeId.classList.remove('employee-ID')
            employeeId.classList.add('red-box')
        }
        return false
    }

    //Checks of the employee id string is the corrent length
    if(!(employeeIdString.length == 12) ){
        console.log('Employee ID Check Failed: Employee Id must be 12 characters long.')
        
        //Displays error messages on page
        message.innerHTML = "Employee Id must be 12 characters long."
        message.classList.add('red-text')

        //Changes the color of the text box if an error is detected
        if(employeeId.classList.contains('employee-ID')){
            employeeId.classList.remove('employee-ID')
            employeeId.classList.add('red-box')
        }
        return false
    }

    for(i = 0 ; i < employeeIdString.length - 4 ; i++){

        let char_val = employeeIdString.charCodeAt(i)

       //Checks that first 8 characters of the string are only numbers
       if((i <= 7)&&!(char_val >= 48 && char_val <= 57)){   
            console.log('Employee ID Check Failed: The first 8 characters must be numbers.')

            //Displays error messages on page
            message.innerHTML = "The first 8 characters must be numbers."
            message.classList.add('red-text')

            //Changes the color of the text box if an error is detected
            if(employeeId.classList.contains('employee-ID')){
                employeeId.classList.remove('employee-ID')
                employeeId.classList.add('red-box')
            }

            return false
        }

        //Checks that last 4 characters of the string are only upper case characters
       if((i >= 8) && !(char_val >= 65 && char_val <= 90)){ 

            console.log('Employee ID Check Failed: The last 4 characters must be upper case letters.')
            
            //Displays error messages on page
            message.innerHTML = "The last 4 characters must be upper case letters."
            message.classList.add('red-text')

            //Changes the color of the text box if an error is detected
            if(employeeId.classList.contains('employee-ID')){
                employeeId.classList.remove('employee-ID')
                employeeId.classList.add('red-box')
            }
  
            return false
        }
    }

    let char_array = []
   
    for(i = 0 ; i < employeeIdString.length; i++){

        char_array.push(String.fromCharCode(employeeIdString.charCodeAt(i)))

        if(i == 3){

            let tempString = char_array.join('')

            if(parseInt(tempString) != 1100)
            {
                console.log('Employee ID Check Failed: Employee ID must start 1100')

                //Displays error messages on page
                message.innerHTML = " Employee ID must start 1100."
                message.classList.add('red-text')

                //Changes the color of the text box if an error is detected
                if(employeeId.classList.contains('employee-ID')){
                    employeeId.classList.remove('employee-ID')
                    employeeId.classList.add('red-box')
                }
                return false
            }
        }

        //Clears char array
        if(i == 7){
            
            char_array.length = 0;
        }

        //Validates the last 4 characters of the employee id
        if(i == 11){

            //Converts the characterarray into a string
            let tempString = char_array.join('')

            //Checks if the last 4 character match the allowed strings
            if(!(tempString == "ADMN" || tempString == "CLRK" || tempString == "USER" || tempString == "DRVR")){
                console.log('Employee ID Check Failed: ID must end in one of the following options:[ADMN,CLRK,USER,DRVR]')
                
                //Displays error messages on page
                message.innerHTML = "ID must end in one of the following options:[ADMN,CLRK,USER,DRVR]."
                message.classList.add('red-text')

                //Changes the color of the text box if an error is detected
                if(employeeId.classList.contains('employee-ID')){
                    employeeId.classList.remove('employee-ID')
                    employeeId.classList.add('red-box')
                }
                return false
            }
        }

    }

    //Removes error messages on page
    message.innerHTML = ""

    if(message.classList.contains('red-text')){
        message.classList.remove('red-text')
    }
 
    //Reverts the color of the text box if an error is rectifies
    if(employeeId.classList.contains('red-box')){
        employeeId.classList.remove('red-box')
        employeeId.classList.add('employee-ID')
    }
    return true
}

//Checks if the login credentials match any records
function isEmployeeValid(userdata, usertype){
    
    this.userdata = userdata

    //checks if the usertype of the data is empty
    if(usertype == ''){
       console.log('UserType Error : Must define usertype of data')
       return false
    }
   
    //Checks if the usertype of the data is a valid type
    if(!(usertype == 'employeeinfo') && !(usertype == 'driverInfo'))
    {
       console.log('UserType Error: Invaid userType')
       return false
    }
    
    
    if(usertype == 'employeeinfo'){
        
       //Stores data from the form and local storage
       let entry = JSON.parse(this.userdata)
       let records = JSON.parse(localStorage.getItem("employeeinfo"))


        if(sessionStorage.getItem('LogInAttempts')){

            let count = JSON.parse(sessionStorage.getItem("LogInAttempts")).amount
            let currentID = JSON.parse(sessionStorage.getItem("LogInAttempts")).id

            if(count >= 3){
                console.log('Too many log in attemps have been made with the same id')

                //Displays error message on the page
                message.innerHTML = "Too many log in attemps have been made with the same id"
                message.classList.add('red-text')

                return false
            }
            
            if(currentID == employeeId.value){

                count++

                //JSON object to  serve as a record for past log in attemps with the same name
                let loginAttempts = {
                    "amount": count,
                    "id": employeeId.value
                }

                sessionStorage.setItem("LogInAttempts",JSON.stringify(loginAttempts))
            }
        }

        //If record of past attemps is not found in storage create a record with the current id string and set past attemps to 1
        if(!sessionStorage.getItem('LogInAttempts')){
            
            //JSON object to  serve as a record for past log in attemps with the same name
            let loginAttempts = {
                "amount": 1,
                "id": employeeId.value
            }

            sessionStorage.setItem("LogInAttempts",JSON.stringify(loginAttempts))
        }
    
 
       //Seaches for record number/password pair which matches the entry
       for(i = 0 ; i < records.length; i++){

       //Retrieves matching record data from local storage
          if(entry.employeeId == records[i].employeeId && entry.password == records[i].password){
            
                //Clears log in attemps
                if(sessionStorage.getItem("LogInAttempts")){
                    sessionStorage.removeItem("LogInAttempts")
                    
                }  

                //Creates JSON object to store record information
                let tempRecord = {
                    "firstName" : records[i].firstName,
                    "lastName" : records[i].lastName,
                    "employeeId" : records[i].employeeId
                }
    
                //Adds JSON object to sessionStorage
                sessionStorage.setItem("employeeinfo",JSON.stringify(tempRecord))

                //Removes error message on the page
                message.innerHTML = ""

                if( message.classList.contains('red-text')){
                
                message.classList.remove('red-text')
                }
                
                if(employeeId.classList.contains('red-box')){
                    employeeId.classList.remove('red-box')
                    employeeId.classList.add('employee-ID')
                }

                if(passwordString.classList.contains('red-box')){
                    password.classList.remove('red-box')
                    password.classList.add('password')
                }

                
                return true
            }
        }

        //Displays error message on the page
        message.innerHTML = "Employee ID and Password do not match any records"
        message.classList.add('red-text')

        if(employeeId.classList.contains('employee-ID')){
            employeeId.classList.remove('employee-ID')
            employeeId.classList.add('red-box')
        }

        if(passwordString.classList.contains('password')){
            password.classList.remove('password')
            password.classList.add('red-box')
        }
        return false
    }

   
}

//Returns valid employee and password as a JavaScript object data in JSON notation
function getEmployeeData(){

    const data = {
        "employeeId": employeeId.value,
       "password": password.value
 
    };
    //console.log(JSON.stringify(data))
    return JSON.stringify(data)
 }

function submit(){

    if(checkEmployeeId(employeeId.value) && (checkPassword(password.value)) && isEmployeeValid(getEmployeeData(), "employeeinfo")){
        
        console.log('Submission successful')
        
        //Log in status is updated in session storage if it is already there
        if(sessionStorage.getItem('EmployeeLogInStatus'))
        {
            let loginInStatus  = JSON.parse(sessionStorage.getItem("EmployeeLogInStatus"))
            loginInStatus.isLoggedOn = true
            sessionStorage.setItem("EmployeeLogInStatus",JSON.stringify(loginInStatus))

        }
        //Log in status stored in session storage if it is not already there
        if(!sessionStorage.getItem('EmployeeLogInStatus'))
        {
            //Object which stores log in status
            let isLoggedOn = {
            "isLoggedOn" : true 
            }

            sessionStorage.setItem("EmployeeLogInStatus",JSON.stringify(isLoggedOn))
        }

        //window.open('../../php/admin/admin_console.php','_self')
        return true
    }
}