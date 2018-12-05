<form>
   
    <!--Question 1-->
    <div class="form-group">
    <legend>What year was CSUMB founded? </legend>
    <input type="text" class="form-control" name="question1" size="5" /><br />
    <div id="question1-feedback" class="answer"></div><br />
    </div>

    <!--Question 2-->
    <div class="form-group">
    <legend>What is the name of CSUMB's mascot?</legend><br />
    <input type="radio" class="form-check-input" name="question2" id="q2-1"  value="A"/><label for='q2-1'>Otto <br />
    <input type="radio" class="form-check-input" name="question2" id="q2-2"  value="B"/><label for='q2-2'>Albus <br />
    <input type="radio" class="form-check-input" name="question2" id="q2-3"  Value="C"/><label for='q2-3'>Monte Rey <br />
    <div id="question2-feedback" class="answer"></div><br />
     </div>
     
    <!--Question 3 -->
    <div class="form-group">
   <legend> Monterey Bay provides fully online program?</legend><br />
    <input type="radio" class="form-check-input" name="question3" id="q3-1" value="T"/><label for='q3-1'>True <br />
    <input type="radio" class="form-check-input" name="question3" id="q3-2" value="F"/><label for='q3-2'>False<br />
    <div id="question3-feedback" class="answer"></div><br />
    </div>
    
    <!--Question 4-->
    <div class="form-group">
    <legend>There is no tuition at Monterey Bay is?</legend><br />
    <input type="radio" class="form-check-input" name="question4" id="q4-1"  value="T"/><label for='q4-1'>True<br />
    <input type="radio" class="form-check-input" name="question4" id="q4-2"  value="F"/><label for='q4-2'>False <br />
    <div id="question4-feedback" class="answer"></div><br />
    </div>
    

    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    
    <!--Will display the "loading" or "spinning" animated gif-->
    <div id="waiting"></div>
</form>

<!--Will display the quiz score-->
<div id="scores"></div>