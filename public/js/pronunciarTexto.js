
function pronunciarEspayol(txt){

    let utterance = new SpeechSynthesisUtterance(txt)
    utterance.lang = 'es-ES'
     //velocidad del reproductor
    
    speechSynthesis.speak(utterance);
    
    }

    function pronunciarIngles(txt,velocidad){

        let utterance = new SpeechSynthesisUtterance(txt)
        utterance.lang = 'en-US'
        //velocidad del reproductor
        utterance.rate = velocidad;
  
     
        speechSynthesis.speak(utterance);
        
        }

function pronunciarIngles02(txt){

            let utterance = new SpeechSynthesisUtterance(txt)
            utterance.lang = 'en-US'
            speechSynthesis.speak(utterance);
            
            }