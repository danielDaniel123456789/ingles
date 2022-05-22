
function pronunciarEspayol(txt){

    let utterance = new SpeechSynthesisUtterance(txt)
    utterance.lang = 'es-ES'
    speechSynthesis.speak(utterance);
    
    }

    function pronunciarIngles(txt){

        let utterance = new SpeechSynthesisUtterance(txt)
        utterance.lang = 'en-US'
        speechSynthesis.speak(utterance);
        
        }

function pronunciarIngles02(txt){

            let utterance = new SpeechSynthesisUtterance(txt)
            utterance.lang = 'en-US'
            speechSynthesis.speak(utterance);
            
            }