//Do not forget to handle error displays on the webpage

//Variables which store the HTML elements 
let licenseNoString = document.getElementsByClassName('License-Number')[0]
let passwordString = document.getElementsByClassName('password')[0]
let message = document.getElementById('message')
let jsStatus = document.getElementById('jscheck')
let form = document.getElementsByTagName('form')[0];
let btn = document.getElementsByTagName('button')[0]

//Stores the file path of the html document
const FILE_PATH_DRIVER = "driver/index"

//Events listener 
window.addEventListener('load', function(){

   // load the data
   loadData();
   
   //Loads login status into session storage
   loadDriverLogin();
   loadEmployeeLogin();

   //Updates the location in the wedsite directory in sessionStorage to the current location using a JSON objet
   if(sessionStorage.getItem("path")){

       let path = JSON.parse(sessionStorage.getItem("path"))
       path.path = FILE_PATH_DRIVER
       sessionStorage.setItem("path", JSON.stringify(path))
   }

   //Creates and adds the current location in the wedsite directory to sessionStorage using a JSON object
   if(!sessionStorage.getItem("path")){
       
       let path ={
           "path" : FILE_PATH_DRIVER
       }
       sessionStorage.setItem("path",JSON.stringify(path))
   }

})
    
btn.addEventListener('submit',function(event){
      
      if(!check()){

         jsStatus.value = false
         event.preventDefault();
         event.stopImmediatePropagation();
         return
      }
 
      event.preventDefault();
     
})
   

document.getElementsByTagName('button')[0].addEventListener('click', function(event){
   if(!check()){
      event.preventDefault()
   }else{

      event.stopImmediatePropagation();
      jsStatus.value = true;

   }
   
})

//Loads record data into local storage
function loadData()
{
   var driverArray = [
      {
         nationalId: "1973-02-09-3043",
         licenseNo: "135686819730209",
         firstName: "Andrew",
         lastName: "Pryor",
         address1: "31 ",
         address2: "Prior Park",
         parish: "St. James",
         username: "Qwer1234",
         password:"andrewPryor123"
      },

      {
         nationalId: "1967-12-12-0404",
         licenseNo: "143647819671212",
         firstName: "Jennifer",
         lastName: "Davis",
         address1: "Wavell Ave",
         address2: "Black Rock",
         parish: "St. Michael",
         username: "Geju0593",
         password:"Anoth3rpass"
      },

      {
         nationalId: "1979-04-22-1209",
         licenseNo: "100893419790422",
         firstName: "Anderson",
         lastName: "Alleyne",
         address1: "Lascelles Terrace",
         address2: "The Pine",
         parish: "St. Michael",
         username: "Oyqb0789",
         password:"thePassw0rd"
      }
   ]

   var employeeArray = [
      {
         employeeId: "11005457ADMN",
         firstName: "Merissa",
         lastName: "Halliwall",
         password:"f1rst1Pa55"
      },

      {
         employeeId: "11000907DRVR",
         firstName: "Terold",
         lastName: "Bostwick",
         password:"secur3Acc3s5"
      },

      {
      employeeId: "11001478CLRK",
      firstName: "Vanda",
      lastName: "Marshall",
      password:"Oll1Ollip0ps"
      }
   ]

   //add to localStorage 
   if (!localStorage.getItem("driverInfo")) {
      localStorage.setItem("driverInfo", JSON.stringify(driverArray));
   }
   if (!localStorage.getItem("employeeinfo")) {
      localStorage.setItem("employeeinfo", JSON.stringify(employeeArray));
   }
}

function loadDriverLogin(){
   
   //Object which stores log in status
   let isLoggedOn = {
      "isLoggedOn" : false,
   }

   //Log in status stored in session storage if it is not already there
   if(!sessionStorage.getItem('LogInStatus'))
   {
      sessionStorage.setItem("LogInStatus",JSON.stringify(isLoggedOn))
   }

      //Log in status is untouched if it ias already found in session storage
   if(sessionStorage.getItem('LogInStatus'))
   {
      return
   }
   
}

function loadEmployeeLogin(){
   
   //Object which stores log in status
   let isLoggedOn = {
      "isLoggedOn" : false, 
   }

   //Log in status is updated in session storage if it is already there
   if(sessionStorage.getItem("EmployeeLogInStatus"))
   {
      // let logInStatus  = JSON.parse(sessionStorage.getItem("EmployeeLogInStatus"))
      // logInStatus.isLoggedOn = false
      // sessionStorage.setItem("EmployeeLogInStatus",JSON.stringify(logInStatus))
      return
   }

   //Log in status stored in session storage if it is not already there
   if(!sessionStorage.getItem("EmployeeLogInStatus"))
   {
      sessionStorage.setItem("EmployeeLogInStatus",JSON.stringify(isLoggedOn))
   }
   
   if(sessionStorage.getItem('LogInAttempts')){

      sessionStorage.removeItem("LogInAttempts")
   }
   return
   
}

//Validates the Password
function checkPassword(passwd){

   let password = passwd

   //Checks if the string is empty 
   if(password == ''){
      console.log('Password field is empty.')

      //Displays error message on the page
      message.innerHTML = "Password field is empty."
      message.classList.add('red-text')

      //Changes the text box when an error is detected
      if(passwordString.classList.contains('password')){
         passwordString.classList.remove('password')
         passwordString.classList.add('red-box')
      }

      return false
   }
   
   //Checks if the licence number is between 10-18 characters
   if(!(password.length >= 10 && password.length <= 18)){
      console.log('Password must be between 10-18 characters.')

      //Displays error message on the page
      message.innerHTML = "Password must be between 10-18 characters."
      message.classList.add('red-text')
 
      //Changes the text box when an error is detected
      if(passwordString.classList.contains('password')){
         passwordString.classList.remove('password')
         passwordString.classList.add('red-box')
      }
      return false
   }

   //Validates the string according to criteria characters

   let capitalCount = 0
   let numberCount = 0

   for(i = 0; i < password.length;i++){

      //Stored the ascii code of the current charater in the string
      let char_val = password.charCodeAt(i);

      //checks if the string start with a character
      if((i == 0) && !((char_val >= 65 && char_val <= 90 || char_val >= 97 && char_val <= 122))){

         console.log('Error: Password does not start with a character')
         
         //Displays error message on the page
         message.innerHTML = "Password does not start with a character"
         message.classList.add('red-text')
   
         //Changes the text box when an error is detected
         if(passwordString.classList.contains('password')){
            passwordString.classList.remove('password')
            passwordString.classList.add('red-box')
         }
         return false
      }

      //Checks if the string contains an upper case letter
      if(char_val >= 65 && char_val <= 90 ){

         capitalCount++
      }

      //Checks if the string contains a number
      if(char_val >= 48 && char_val <= 57 ){

         numberCount++
      }

      //checks if the string only conatins alphanumeric characters 
      if(!(char_val >= 48 && char_val <= 57 || char_val >= 65 && char_val <= 90 || char_val >= 97 && char_val <= 122)){
          
         console.log('Error: Illegal characters detected')
         
         //Displays error message on the page
         message.innerHTML = "Password must on contain alphanumeric characters"
         message.classList.add('red-text')
   
         //Changes the text box when an error is detected
         if(passwordString.classList.contains('password')){
            passwordString.classList.remove('password')
            passwordString.classList.add('red-box')
         }

         return false
      }
  }

  if(!capitalCount > 0){

      console.log('Password must contain at least one upper case character')

      //Displays error message on the page
      message.innerHTML = "Password must contain at least one upper case character"
      message.classList.add('red-text')

      //Changes the text box when an error is detected
      if(passwordString.classList.contains('password')){
         passwordString.classList.remove('password')
         passwordString.classList.add('red-box')
      }  
      return false
  }

  if(!numberCount > 0){
      console.log('Password must contain at least one number') 
      
      //Displays error message on the page
      message.innerHTML = "Password must contain at least one number"
      message.classList.add('red-text')

      //Changes the text box when an error is detected
      if(passwordString.classList.contains('password')){
         passwordString.classList.remove('password')
         passwordString.classList.add('red-box')
      }

      return false
  }
  
   console.log('Password is valid')
   //Removes error message on the page
   message.innerHTML = ""
   message.classList.remove('red-text')

   //Changes the color of text box back to default when an error is rectified
   if(passwordString.classList.contains('red-box')){

      passwordString.classList.remove('red-box')
      passwordString.classList.add('password')
   }

   return true

}

//Validates the license number
function checkLicenseno(lno){

   let license = lno

   //checks if the textbox is empty
   if(license == ''){
      console.log('License Number Check Failed: No license number entered')
      
      //Displays errors message on the page
      message.innerHTML = "License Number Check Failed: No license number entered"
      message.classList.add('red-text')
      
      //Changes the color of the input boxes when an error is detected
      if(licenseNoString.classList.contains('License-Number')){
          
         licenseNoString.classList.remove('License-Number')
         licenseNoString.classList.add('red-box')

      }
      return false
   }

   //checks if the the string is the required length
   if(license.length != 15){
      console.log('License Number Check Failed: license number entered must be 15 characters long')
      
      //Displays errors message on the page
      message.innerHTML = "License No. Check Failed: No. must be 15 characters long"
      message.classList.add('red-text')
      
      //Changes the color of the input boxes when an error is detected
      if(licenseNoString.classList.contains('License-Number')){
         
         licenseNoString.classList.remove('License-Number')
         licenseNoString.classList.add('red-box')

      }
      return false
   }
      
   //Checks if the string only contains a digits
   for(i = 0 ; i < license.length; i++){

      let char_val = license.charCodeAt(i)

      //Checks that each character in the string is a number
      if(!(char_val >= 48 && char_val <= 57)){
         console.log('License Number Check Failed: License number must only contain digits')
         
         //Displays errors message on the page
         message.innerHTML = "License Number Check Failed: License number must only contain digits"
         message.classList.add('red-text')
         
         //Changes the color of the input boxes when an error is detected
         if(licenseNoString.classList.contains('License-Number')){
            
            licenseNoString.classList.remove('License-Number')
            licenseNoString.classList.add('red-box')

         }
         return false
      }
   }

   //Splits the national id section of license string into its respective fields for validation 
   let licenseArray = []
   for(i = 7 ; i < license.length; i++){

      //Stores the individual characters of the license string 
      licenseArray.push(String.fromCharCode(license.charCodeAt(i)))

      //Separates the yyyy,mm,dd,xxxx fields by a space in License array
      if(i == 10 ){licenseArray.push(' ');}

      if(i == 12 ){licenseArray.push(' ');}
   }

   //Stores the fields in an array
   let nationalIdFields = licenseArray.join('').split(' ')

   //Checks that the year field of the id lies between 1952 and 2002
   if(!(parseInt(nationalIdFields[0]) >= 1952 && parseInt(nationalIdFields[0]) <= 2006)){
      console.log('License checks failed: Year must between 1952 and 2006');
       
         //Displays errors message on the page
         message.innerHTML = "License Number Check Failed: Year must between 1952 and 2006"
         message.classList.add('red-text')
         
         //Changes the color of the input boxes when an error is detected
         if(licenseNoString.classList.contains('License-Number')){
            
            licenseNoString.classList.remove('License-Number')
            licenseNoString.classList.add('red-box')

         }
      return false
  }

  //Checks that the month field of the id lies between 1 and 12
  if(!(parseInt(nationalIdFields[1]) >= 1 && parseInt(nationalIdFields[1]) <= 12)){
      console.log('License checks failed: Month must between 01 and 12');

      //Displays errors message on the page
      message.innerHTML = "License Number Check Failed: Month must between 01 and 12"
      message.classList.add('red-text')
      
      //Changes the color of the input boxes when an error is detected
      if(licenseNoString.classList.contains('License-Number')){
         
         licenseNoString.classList.remove('License-Number')
         licenseNoString.classList.add('red-box')

      }

      return false
  }

  //Checks that the day field of the id lies between 1 and 31
  if(!(parseInt(nationalIdFields[2]) >= 1 && parseInt(nationalIdFields[2]) <= 31)){
      console.log('License checks failed: Day must between 01 and 31');
      
      //Displays errors message on the page
      message.innerHTML = "License Number Check Failed: Day must between 01 and 31"
      message.classList.add('red-text')
      
      //Changes the color of the input boxes when an error is detected
      if(licenseNoString.classList.contains('License-Number')){
         
         licenseNoString.classList.remove('License-Number')
         licenseNoString.classList.add('red-box')

      }

      return false
  }

  console.log('License number is valid')

  //Removes error message when error is rectified
  if(message.classList.contains('red-text')){
      message.innerHTML = ""
      message.classList.remove('red-text')
  }

  //Changes text box colour back to the default color when the error is rectified
  if(licenseNoString.classList.contains('red-box')){
      licenseNoString.classList.remove('red-box')
      licenseNoString.classList.add('License-Number')
  }
   return true
}

//Checks user credentials
function checkUser(data, usertype){

   this.data = data

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
   
   if(usertype == 'driverInfo'){

      //Stores data from the form and local storage
      let entry = JSON.parse(this.data)
      let records = JSON.parse(localStorage.getItem("driverInfo"))
      console.log(records)

      //Seaches for record number/password pair which matches the entry
      for(i = 0 ; i < records.length; i++){

         //Retrieves matching record data from local storage
         if(entry.licenseNo == records[i].licenseNo && entry.password == records[i].password){


            //Creates JSON object to store record information
            let tempRecord = {
               "firstName" : records[i].firstName,
               "lastName" : records[i].lastName,
               "licenseNo" : records[i].licenseNo
            }
         
            //Adds JSON object to sessionStorage
            sessionStorage.setItem("driverInfo",JSON.stringify(tempRecord))

            //Object which stores log in status
            let isLoggedOn = {
               "isLoggedOn" : true 
            }

            //Log in status stored in session storage if it is not already there
            if(!sessionStorage.getItem('LogInStatus'))
            {
               sessionStorage.setItem("LogInStatus",JSON.stringify(isLoggedOn))
            }

            //Log in status is updated in session storage if it is already there
            if(sessionStorage.getItem('LogInStatus'))
            {
               let loginInStatus  = JSON.parse(sessionStorage.getItem("LogInStatus"))
               loginInStatus.isLoggedOn = true
               sessionStorage.setItem("LogInStatus",JSON.stringify(loginInStatus))

            }

            //Removes error message on the page
            message.innerHTML = ""

            if( message.classList.contains('red-text')){
               
               message.classList.remove('red-text')
            }
            

            if(licenseNoString.classList.contains('red-box')){
               licenseNoString.classList.remove('red-box')
               licenseNoString.classList.add('License-Number')
            }

            if(passwordString.classList.contains('red-box')){
               passwordString.classList.remove('red-box')
               passwordString.classList.add('password')
            }

            return true
         }
      }
      //Displays error message on the page
      message.innerHTML = "License No. and Password do not match any records"
      message.classList.add('red-text')

      if(licenseNoString.classList.contains('License-Number')){
         licenseNoString.classList.remove('License-Number')
         licenseNoString.classList.add('red-box')
      }

      if(passwordString.classList.contains('password')){
         passwordString.classList.remove('password')
         passwordString.classList.add('red-box')
      }


      return false
   }

}

//Returns valid license number and password as a JavaScript object data in JSON notation
function getData(){

   const data = {
      licenseNo: licenseNoString.value,
      password: passwordString.value

   };
   console.log(JSON.stringify(data))
   return JSON.stringify(data)
}

//Validates form and logs in user
function check(){

   if(checkPassword(passwordString.value) && checkLicenseno(licenseNoString.value) && checkUser(getData(), 'driverInfo')){
      window.open('../../php/driver/public_console.php','_self')
      return true
   }
   return false;
}
