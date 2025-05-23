let meetingInfo = document.getElementById('meeting-info');
let meetingQuantity = document.getElementById('meeting_quantity');

let generateHtml = (e) =>{
    let quantity = e.target.value;
    meetingInfo.innerHTML = '';

    for(let i = 0; i < quantity;i++){
        let string = `<div class = set><div class='section'>
        <div class='form-label'>
            <label for='meeting_day${i+1}'>Meeting Day (${i+1})</label>
        </div>
        <div class='form-input'>
            <div class='meeting-select-input'>
                <select type='text' id='meeting_day${i+1}'>
                    <option>Monday</option>
                    <option>Tuesday</option>
                    <option>Wednesday</option>
                    <option>Thursday</option>
                    <option>Friday</option>
                    <option>Saturday</option>
                    <option>Sunday</option>
                </select>
            </div>         
        </div>               
    </div>
    <div class='section'>
        <div class='form-label'>
            <label for='meeting_time${i+1}'>Meeting Time (${i+1})</label>
        </div>
        <div class='form-input'>
            <input type = 'time'id='meeting_time${i+1}' name='meeting_time${i+1}'>
        </div>               
    </div>
    <div class='section'>
        <div class='form-label'>
            <label for='meeting_location${i+1}'>Meeting Location (${i+1})</label>
        </div>
        <div class='form-input'>
            <input id='meeting_location${i+1}' name='meeting_location${i+1}'>
        </div>               
    </div></div>`;
        meetingInfo.innerHTML += string;
    }
}
meetingQuantity.addEventListener('change',generateHtml);