document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const user = document.getElementById("username");
    const email = document.getElementById("email");
    const msg = document.getElementById("msg");
    const mobNo = document.getElementById("mobileno");
    const subrub = document.getElementById("subrub");
    

    
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        validateForm();
    });

    const sendData = (sRate, count) => {
        if (sRate === count) {
            alert("Your details are submitted successfully");
        }
        
    };

    const successMsg = () => {
        let formCon = form.getElementsByClassName("form-group");
        
        let sRate = 0;  // initialize the success rate counter
        let count = formCon.length;  // get the total number of form groups

        for (let i = 0; i < formCon.length; i++) {
            if (formCon[i].classList.contains("success")) {
                sRate++;  // increment sRate only if the form group is successful
            }
        }
        sendData(sRate, count);  // call sendData after checking all form groups
    };


    const isEmail = (emailVal) => {
        var atSymbol = emailVal.indexOf("@");
        var dot = emailVal.lastIndexOf(".");
        if (atSymbol < 1) {
            return false;
        }
        if (dot <= atSymbol + 3) {
            return false;
        }
        if (dot === emailVal.length - 1) {
            return false;
        }
        return true;
    };

    const validateForm = () => {
        const userVal = user.value.trim();
        const emailVal = email.value.trim();
        const msgVal = msg.value.trim();
        const mobVal = mobNo.value.trim();
        const subrubVal = subrub.value.trim();

        // validate username
        if (userVal === "") {
            setErrorMsg(user, "username cannot be blank");
        } else if (userVal.length <= 2) {
            setErrorMsg(user, "username min 3 char");
        } else {
            setSuccessMsg(user);
        }
         // validate mobileno
        if(mobVal === ""){
            setErrorMsg(mobNo, "mobile number cannot be blank");
        }
        else if (isNaN(mobVal)) {
            setErrorMsg(mobNo, "Only numbers are allowed");
        }
        else if(mobVal.length != 10){
            setErrorMsg(mobNO, "not a valid mobile number");
        }
        else{
            setSuccessMsg(mobNo);
        }

        // validate email
        if (emailVal === "") {
            setErrorMsg(email, "email cannot be blank");
        } else if (!isEmail(emailVal)) {
            setErrorMsg(email, "not a valid email");
        } else {
            setSuccessMsg(email);
        }

        // validate Message
        if (msgVal === "") {
            setErrorMsg(msg, "Message cannot be blank");
        } else if (msgVal.length <= 5) {
            setErrorMsg(msg, "username min 5 char");
        } else {
            setSuccessMsg(msg);
        }

        // validate text
        if (subrubVal === "") {
            setErrorMsg(subrub, "text cannot be blank");
        } else if (subrubVal.length <= 2) {
            setErrorMsg(subrub, "text min 3 char");
        } else {
            setSuccessMsg(subrub);
        }


        successMsg();
    };


    function setErrorMsg(input, errorMsg) {
        const formGroup = input.parentElement;
        const errorShow = formGroup.querySelector(".alert-danger");
        errorShow.innerText = errorMsg;
        formGroup.className = "form-group error";
    }

    function setSuccessMsg(input) {
        const formGroup = input.parentElement;
        formGroup.className = "form-group success";
        const successShow = formGroup.querySelector(".alert-success");
        successShow.innerText = "done";
    }

});
