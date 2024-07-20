<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="storiesAndTournament.css">
    <style>
        body {
    display: flex;
    justify-content: center;
    margin: 0;
    padding: 20px;
}

#storiesAll{
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(220px,1fr));
    grid-gap: 30px;
    justify-content: center;
    width: 80%;
    margin: auto;
    border-radius: 20px;
    box-shadow: -7px 7px 1px rgba(0, 0, 0, 0.869);
    background-color: #1d5374;
    padding: 50px 50px 30px 50px;
    transition: all 0.3s;

}
.story-container{
    padding: 30px;
    border-radius: 20px;
    background: linear-gradient(to right, #fff4f6, #a8a8a7);
    text-align: center;
    margin-bottom: 30px;
    transition: all 0.3s;
    box-shadow: -7px 7px 1px rgba(0, 0, 0, 0.604);

}
.story-image {
    width: 160px;
    height: 160px;
    cursor: pointer;
    border: 3px solid;
    border-radius: 8px;
    box-shadow: -5px 5px 0px rgba(0, 0, 0, 0.604);
    transition: all 0.3s;

}

.story-image:active{
    transform: translate(-5px,5px);
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.601);
    transition: all 0.2s;
}
.story-box {
    display: none;
    width: 100%;
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-shadow: -5px 5px 0px rgba(0, 0, 0, 0.604);
    background-color: #f9f9f9;
    transition: all 0.3s;
}


#Questions-box{
    cursor: pointer;
    display: block;
    justify-content: center;
    width: 80%;
    margin: auto;
    border-radius: 20px;
    box-shadow: -6px 6px 0px rgba(0, 0, 0, 0.869);
    background-color: #1d5374;
    padding: 50px 50px 30px 50px;
    transition: all 0.3s;

}
.Question-container{
    padding: 30px;
    border-radius: 20px;
    background: linear-gradient(to right, #fff4f6, #a8a8a7);
    text-align: center;
    margin-bottom: 30px;
    transition: all 0.3s;
    box-shadow: -5px 5px 1px rgba(0, 0, 0, 0.604);

}
#Questions-box p{
    user-select: none;
}


hr{
    width: 20%;
    margin: auto;
    border: 3px solid rgba(192, 0, 0, 0.745);
    border-radius: 10px;
    opacity: 1;
    transition: all 1s;

}



.Answers{
    margin-top: 20px;
    display: none;
}

.Answers label{
    user-select: none;
}
.Answers .radios{
    padding: 8px;
}

.radios label{
    padding: 7px 15px 7px 15px;
    border-radius: 8px;
}

.submitButton {
    padding: 5px 10px;
    border-radius: 6px;
    box-shadow: -3px 3px 0px rgba(0, 0, 0, 0.659);
    transition: all 0.2s;
}

.submitButton:active {
    transform: translate(-3px, 3px);
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.659);
}

@media only screen and (max-width: 850px) {


    #storiesAll,#Questions-box{
        width: 95%;
    }
}
        </style>
</head>

<body>

    <div id="Questions-box">

        
            <div class="Question-container" >
                <p onclick="toggleAnswers(document.getElementById('Question1')); expandLine(this)"> ما هو تاريخ رهبنه الأنبا ويصا مطران البلينا</p>
                <hr>
                <div class="Answers" id="Question1">
                    <div class="radios"><input type="radio" name="Q1" id="Q1-1st"><label for="Answer#1">10 مارس 1972</label></div>
                    <div class="radios"><input type="radio" name="Q1" id="Q1-2nd"><label for="Answer#2">9 مارس 1972</label></div>
                    <div class="radios"><input type="radio" name="Q1" id="Q1-3rd"><label for="Answer#3">8 مارس 1972</label></div>
                    <div class="radios"><input type="radio" name="Q1" id="Q1-4th"><label for="Answer#4">7 مارس 1972</label></div>
                    <button type="button" onclick="checkAnswers(1,'Q1-1st');submit(this)"  class="submitButton" >Submit</button>
                </div>
            </div>
            

            <div class="Question-container">
                <p onclick="toggleAnswers(document.getElementById('Question2')); expandLine(this)">    ما هو تاريخ رسامه الأنبا باخوميوس مطران البحيرة للاسقفيه</p>
                <hr>
                <div class="Answers" id="Question2">
                    <div class="radios"><input type="radio" name="Q2" id="Q2-1st"><label for="Answer#1"> ديسمبر 1971</label></div>
                    <div class="radios"><input type="radio" name="Q2" id="Q2-2nd"><label for="Answer#2"> ديسمبر 1961</label></div>
                    <div class="radios"><input type="radio" name="Q2" id="Q2-3rd"><label for="Answer#3"> ديسمبر 1871</label></div>
                    <div class="radios"><input type="radio" name="Q2" id="Q2-4th"><label for="Answer#4"> ديسمبر 1981</label></div>
                    <button type="button" onclick="checkAnswers(2,'Q2-1st');submit(this)"  class="submitButton" >Submit</button>

                </div>
            </div>
            
         

            <div class="Question-container">
                <p onclick="toggleAnswers(document.getElementById('Question3')); expandLine(this)">الأنبا أمونيوس أسقف الأقصر من ابناء؟</p>
                <hr>
                <div class="Answers" id="Question3">
                    <div class="radios"><input type="radio" name="Q3" id="Q3-1st"><label for="Answer#1">دير الأنبا بيشوي</label></div>
                    <div class="radios"><input type="radio" name="Q3" id="Q3-2nd"><label for="Answer#2">دير المحرق </label></div>
                    <div class="radios"><input type="radio" name="Q3" id="Q3-3rd"><label for="Answer#3">دير الانبا شنوده </label></div>
                    <div class="radios"><input type="radio" name="Q3" id="Q3-4th"><label for="Answer#4">دير الانبا تادرس </label></div>
                    <button type="button" onclick="checkAnswers(3,'Q3-4th');submit(this)"  class="submitButton">Submit</button>
                </div>
            </div>
            
            <div class="Question-container">
                <p onclick="toggleAnswers(document.getElementById('Question4')); expandLine(this)"> الأنبا تادرس مطران بورسعيد رسم بيد؟</p>
                <hr>
                <div class="Answers" id="Question4">
                    <div class="radios"><input type="radio" name="Q4" id="Q4-1st"><label for="Answer#1">البابا المعظم الأنبا شنوده الثالث</label></div>
                    <div class="radios"><input type="radio" name="Q4" id="Q4-2nd"><label for="Answer#2">البابا المعظم الأنبا تواضروس الثاني </label></div>
                    <div class="radios"><input type="radio" name="Q4" id="Q4-3rd"><label for="Answer#3">البابا المعظم الأنبا  باخميوس</label></div>
                    <div class="radios"><input type="radio" name="Q4" id="Q4-4th"><label for="Answer#4">البابا المعظم الأنبا كيرلس السادس</label></div>
                    <button type="button" onclick="checkAnswers(4,'Q4-3rd');submit(this)"  class="submitButton" >Submit</button>
                </div>
            </div>
            
            <div class="Question-container">
                <p onclick="toggleAnswers(document.getElementById('Question5')); expandLine(this)">الأنبا بفنوتيوس مطران سمالوط رسم قسا يوم؟</p>
                <hr>
                <div class="Answers" id="Question5">
                    <div class="radios"><input type="radio" name="Q5" id="Q5-1st"><label for="Answer#1">يوم الأحد 30 مارس</label></div>
                    <div class="radios"><input type="radio" name="Q5" id="Q5-2nd"><label for="Answer#2">يوم الاتنين 30 فبراير</label></div>
                    <div class="radios"><input type="radio" name="Q5" id="Q5-3rd"><label for="Answer#3">يوم الأحد 20 مارس</label></div>
                    <div class="radios"><input type="radio" name="Q5" id="Q5-4th"><label for="Answer#4">يوم الأحد 25 مارس</label></div>
                    <button type="button" onclick="checkAnswers(5,'Q5-2nd');submit(this)"  class="submitButton" >Submit</button>
                </div>
            </div>
            
            <div class="Question-container">
                <p onclick="toggleAnswers(document.getElementById('Question6')); expandLine(this)"> الأنبا بنيامين مطران المنوفية كان الابن الاكبر وكان له ؟</p>
                <hr>
                <div class="Answers" id="Question6">
                    <div class="radios"><input type="radio" name="Q6" id="Q6-1st"><label for="Answer#1">3 شقيقات </label></div>
                    <div class="radios"><input type="radio" name="Q6" id="Q6-2nd"><label for="Answer#2">4 شقيقات</label></div>
                    <div class="radios"><input type="radio" name="Q6" id="Q6-3rd"><label for="Answer#3">شقيقات5</label></div>
                    <div class="radios"><input type="radio" name="Q6" id="Q6-4th"><label for="Answer#4">شقيقات6</label></div>
                    <button type="button" onclick="checkAnswers(6,'Q6-1st');submit(this)"  class="submitButton" >Submit</button>
                </div>
            </div>
            
            <div class="Question-container">
                <p onclick="toggleAnswers(document.getElementById('Question7')); expandLine(this)"> الأنبا أنطونيوس مرقس مطران جنوب أفريقيا من ابناء دير؟</p>
                <hr>
                <div class="Answers" id="Question7">
                    <div class="radios"><input type="radio" name="Q7" id="Q7-1st"><label for="Answer#1">الانبا بيشوي</label></div>
                    <div class="radios"><input type="radio" name="Q7" id="Q7-2nd"><label for="Answer#2">البراموس</label></div>
                    <div class="radios"><input type="radio" name="Q7" id="Q7-3rd"><label for="Answer#3">المحرق</label></div>
                    <div class="radios"><input type="radio" name="Q7" id="Q7-4th"><label for="Answer#4">السيده العذراء</label></div>
                    <button type="button" onclick="checkAnswers(7,'Q7-3rd');submit(this)"  class="submitButton" >Submit</button>
                </div>
            </div>
            
            <div class="Question-container">
                <p onclick="toggleAnswers(document.getElementById('Question8')); expandLine(this)"> أشرف نيافته على إيبارشية دمياط وكفر الشيخ والبراري حتى رسامة أسقف لها في نفس العام</p>
                <hr>
                <div class="Answers" id="Question8">
                    <div class="radios"><input type="radio" name="Q8" id="Q8-1st"><label for="Answer#1">الأنبا بولا مطران طنطا وتوابعها، </label></div>
                    <div class="radios"><input type="radio" name="Q8" id="Q8-2nd"><label for="Answer#2">الأنبا باخوميوس مطران البحيرة</label></div>
                    <div class="radios"><input type="radio" name="Q8" id="Q8-3rd"><label for="Answer#3">الأنبا ويصا مطران البلينا</label></div>
                    <div class="radios"><input type="radio" name="Q8" id="Q8-4th"><label for="Answer#4">الأنبا أمونيوس أسقف الأقصر</label></div>
                    <button type="button" onclick="checkAnswers(8,'Q8-2nd');submit(this)"  class="submitButton" >Submit</button>
                </div>
            </div>
            
            <div class="Question-container">
                <p onclick="toggleAnswers(document.getElementById('Question9')); expandLine(this)"> أسماء قبل الأسقفية: أبونا الراهب القمص أنطونيوس الأنبا بيشوي</p>
                <hr>
                <div class="Answers" id="Question9">
                    <div class="radios"><input type="radio" name="Q9" id="Q9-1st"><label for="Answer#1">الأنبا مرقس مطران شبرا الخيمة</label></div>
                    <div class="radios"><input type="radio" name="Q9" id="Q9-2nd"><label for="Answer#2">لأنبا باخوميوس مطران البحيره</label></div>
                    <div class="radios"><input type="radio" name="Q9" id="Q9-3rd"><label for="Answer#3">الأنبا بولا مطران طنطا وتوابعها،</label></div>
                    <div class="radios"><input type="radio" name="Q9" id="Q9-4th"><label for="Answer#4">الأنبا أمونيوس أسقف الأقصر</label></div>
                    <button type="button" onclick="checkAnswers(9,'Q9-4th');submit(this)"  class="submitButton" >Submit</button>
                </div>
            </div>
            
            <div class="Question-container">
                <p onclick="toggleAnswers(document.getElementById('Question2')); expandLine(this)"> الاسم العلماني: أ. حلمي عزيز</p>
                <hr>
                <div class="Answers" id="Question2">
                    <div class="radios"><input type="radio" name="Q2" id="Q2-1st"><label for="Answer#1">الأنبا متاؤس أسقف ورئيس دير السريان</label></div>
                    <div class="radios"><input type="radio" name="Q2" id="Q2-2nd"><label for="Answer#2" >لأنبا مرقس مطران شبرا الخيمه ا</label></div>
                    <div class="radios"><input type="radio" name="Q2" id="Q2-3rd"><label for="Answer#3">لأنبا أمونيوس أسقف الأقصر</label></div>
                    <div class="radios"><input type="radio" name="Q2" id="Q2-4th"><label for="Answer#4">أنبا باخوميوس مطران البحيره</label></div>
                    <button type="button" onclick="checkAnswers(2,'Q2-1st');submit(this)"  class="submitButton" >Submit</button>

                </div>
            </div>
            

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="storiesAndTournament.js"></script>
    <script >function toggleStory(imageElement) {
    var storyBox = imageElement.nextElementSibling;
    var allBoxes = document.getElementById("storiesAll");
    var containers = document.getElementsByClassName("story-container");

    // Toggle the clicked story box ^_^ //
    if (storyBox.style.display === "none" || storyBox.style.display === "") {
        storyBox.style.display = "block";
    } else {
        storyBox.style.display = "none";
    }

    // Check if any story box is visible ^_^ //
    var anyVisible = false;
    for (var i = 0; i < containers.length; i++) {
        if (containers[i].getElementsByClassName("story-box")[0].style.display === "block") {
            anyVisible = true;
        }
    }

    // Adjust the display of all Boxes and text alignment ^_^ //
    if (anyVisible) {
        allBoxes.style.display = "block";
        for (var i = 0; i < containers.length; i++) {
            containers[i].style.textAlign = "left";
        }
    } else {
        allBoxes.style.display = "grid";
        for (var i = 0; i < containers.length; i++) {
            containers[i].style.textAlign = "center";
        }
    }
}
function toggleAnswers(answerElement) {
    if (answerElement.style.display === "none" || answerElement.style.display === "") {
        answerElement.style.display = "block";
        // answerElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else {
        answerElement.style.display = "none";
    }
}

function checkAnswers(questionNumber, correctAnswerId) {
    // Get all radio buttons for the specific question ^_^ //

    const radios = document.getElementsByName('Q' + questionNumber);
    let selectedAnswerId = null;


    // Find the selected radio button ^_^ //

    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            selectedAnswerId = radios[i].id;
            
        }
    }

    // Check if the selected answer is correct ^_^ //

    for (let i = 0; i < radios.length; i++) {
        if (radios[i].id === correctAnswerId) {
            // Highlight correct answer ^_^ //

            radios[i].nextElementSibling.style.background = 'green';

        } else if (radios[i].id === selectedAnswerId) {
             // Highlight wrong answer ^_^ //

            radios[i].nextElementSibling.style.background = 'red';

        }
    }
}

function submit(button) {
    // Hide the button by setting its display property to none ^_^ //
    button.style.display = "none";
}
function expandLine(hr){
    if(hr.nextElementSibling.style.width == "70%"){
        hr.nextElementSibling.style.width = "20%";
    }else{
        hr.nextElementSibling.style.width = "70%"
    }
    
}</script>
</body>
</html>