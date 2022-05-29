
function pronunciarEspayol(txt){

    let utterance = new SpeechSynthesisUtterance(txt)
    utterance.lang = 'es-ES'
     //velocidad del reproductor
    
    speechSynthesis.speak(utterance);
    
    }

    function pronunciarIngles(txt){

        let utterance = new SpeechSynthesisUtterance(txt)
        utterance.lang = 'en-US'
        //velocidad del reproductor
        utterance.rate = 0.5;
  
     
        speechSynthesis.speak(utterance);
        
        }

function pronunciarIngles02(txt){

            let utterance = new SpeechSynthesisUtterance(txt)
            utterance.lang = 'en-US'
            speechSynthesis.speak(utterance);
            
            }