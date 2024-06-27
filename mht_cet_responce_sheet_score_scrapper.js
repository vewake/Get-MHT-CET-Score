//physics --> 2-51
//chemistry --> 52-101
//maths --> 102 to 151
let phy=0
let chem=0
let maths=0
let finalscore=0
let phyincorrect=0
let chemincorrect=0
let mathsincorrect=0
for(let i=2; i<=151; i++){
    let candidaterespone=(document.querySelectorAll(`#tblObjection > tbody:nth-child(1) > tr:nth-child(${i}) > td:nth-child(3) > table:nth-child(7) > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(2)`)[0].innerText).slice(-6)
    let correct = (document.querySelectorAll(`#tblObjection > tbody:nth-child(1) > tr:nth-child(${i}) > td:nth-child(3) > table:nth-child(7) > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(1)`)[0].innerText).slice(-6)
    let questionid = (document.querySelectorAll(`#tblObjection > tbody:nth-child(1) > tr:nth-child(${i}) > td:nth-child(1)`)[0].innerText)
if(i>=2 && i<=51){
    if(candidaterespone==correct){
        phy+=1
    }
    else{
        console.log(`in physics question id ${questionid} incorrect`);
        phyincorrect+=1

    }
}
else if(i>=52 && i<=101){
    if(candidaterespone==correct){
        chem+=1
        }
        else{
            console.log(`in chemistry question id ${questionid} incorrect`);
            chemincorrect+=1
    
        }
    }

else if(i>=102 && i<=151){
    if(candidaterespone==correct){
        maths+=2
        }
        else{
            console.log(`in maths question id ${questionid} incorrect`);
            mathsincorrect+=1
    
        }
    
    }
}
finalscore=phy+chem+maths
console.log(`total incorrect in physics ${phyincorrect}/50`);
console.log(`total incorrect in chemistry ${chemincorrect}/50`);
console.log(`total incorrect in maths ${mathsincorrect}/50`);

console.log(`total marks in physics ${phy}/50`);
console.log(`total marks in chemistry ${chem}/50`);
console.log(`total marks in maths ${maths}/100`);
console.log(`total marks ${finalscore}/200`);
