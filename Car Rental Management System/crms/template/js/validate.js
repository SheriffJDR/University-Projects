//Dom elements

    let makeInput = document.getElementById('makeInput')
    let modelInput = document.getElementById('modelInput')
    let yearInput = document.getElementById('yearInput')
    let vinInput = document.getElementById('vinInput')
    let interiorColorInput = document.getElementById('interiorColorInput')
    let exteriorColorInput = document.getElementById('exteriorInput')
    let licensePlateInput = document.getElementById('licensePlateInput')
    let odometerInput = document.getElementById('odometerInput')
    let availabilityInput = document.getElementById('availabilityInput')
    let dueDateInput = document.getElementById('dueDateInput')
    let dueDateLabel = document.getElementById('dueDateLabel')
    let btn = document.getElementById('submitVehicle')


function toggleDueDate(){

    if(availabilityInput.value ==="rented"){
        dueDateInput.style.display="block";
        dueDateInput.setAttribute("required", "required");
        dueDateLabel.style.display="block";
        dueDateLabel.setAttribute("required", "required");
    }else{
        dueDateInput.style.display = "none";
        dueDateLabel.style.display = "none";
        dueDateInput.removeAttribute("required");
        dueDateLabel.removeAttribute("required");
    }
}

//Events
availabilityInput.addEventListener('change',function(event){
    toggleDueDate()
})



btn.addEventListener('submit', function(event){
    
    if(!check){
        event.preventDefault();
        event.stopImmediatePropagation();
        return;
    }
})

// //Validates make input
// function checkMake(makeString){
     
//     //Checks if the string is emtpy.
//     if(makeString == ''){
//         return false;
//     }
//     //Iterates through every charater of the string  
//     for(i =0; i < makeString.length;i++){

//         let char_val = makeString.charCodeAt(i)

//         //Checks if the string only contains letters of the alphabet
//         if(!(char_val >= 65 && char_val <= 90) && !(char_val >= 97 && char_val <= 122)){
//             return false;
//         }
//     }

//     return true;
// }

// //Validates model input
// function checkModel(modelString){
     
//     //Checks if the string is emtpy.
//     if(modelString == ''){
//         //Displays error messages on page
//         message.innerHTML = " Model field must be filled"
//         message.classList.add('red-text')
//         employeeId.classList.add('red-box')

//         return false;
//     }

//     //Iterates through every charater of the string  
//     for(i =0; i < modelString.length;i++){

//         let char_val = modelString.charCodeAt(i)

//         //Checks if the string only contains letters of the alphabet/o
//         if(!(char_val == 45) && !(char_val >= 48 && char_val <= 57) && !(char_val >= 65 && char_val <= 90) && !(char_val >= 97 && char_val <= 122)){
            
//             //Displays error messages on page
//             message.innerHTML = " Model field may only contain letters, numbers and hyphens'-'."
//             message.classList.add('red-text')
//             employeeId.classList.add('red-box')
//             return false;
//         }
//     }

//     return true
// }

//Checks if all the field contain valid inputs
function check(){
    return false;
}