        const startButton = document.getElementById('startButton');
        const outputDiv = document.getElementById('output');
        const itemsList = document.getElementById('itemsList');
        const cart = document.getElementById('cart');
        const resultDiv = document.getElementById('result'); 
        const quantity = null;
        const listItem = null;
        const price = null;
        totalPrice = null;
        let recognition = null;
        let isListening = false; 
        let recognitionTimeout; 
        let lastCommandTime = 0; 


        $.ajax({
            type: 'GET',
            url: 'cart.php',
            data: {
                quantity: quantity,
                listItem: listItem,
                price: price,
                totalPrice: totalPrice
            },
            success: function(response) {
                
            },
            error: function(error) {
                console.error('Error:', error); 
            }
        });
        
    
        function initRecognition() {
            if (!recognition) {
                recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
                
                recognition.lang = 'en-US'; 
                recognition.continuous = true; 
                recognition.interimResults = true; 
      
                recognition.onresult = (event) => {
                    const transcript = event.results[event.results.length - 1][0].transcript.trim().toLowerCase();
                    addToCart(transcript);
                    console.log(transcript);
                    
                };
                
                recognition.onerror = (event) => {
                    console.error('Speech recognition error:', event.error);
                    outputDiv.textContent = 'Speech recognition error: ' + event.error;
                };

                recognition.onend = () => {
                    startButton.disabled = false; 
                };
            }
        }


    function toggleRecognition() {
        initRecognition();
        
        if (!isListening) {
            recognition.start();
            startButton.innerHTML = '<img src="assets/recording.gif" alt="Recording Icon">';
            startButton.disabled = true;
            isListening = true; 
            console.log('Speech recognition started.');
            
        } else {
            clearTimeout(recognitionTimeout); 
            recognition.stop();
            startButton.innerHTML = '<img src="assets/metal ball.png" alt="Recording Icon">'; 
            isListening = false; 
            console.log('Speech recognition stopped.');
            recognition = null;
        }
    }

    function getItemListId(itemName) {
        switch (itemName) {
            case "retro":
                return "itemsList1";
            case "trendy":
                return "itemsList2";
            case "urban":
                return "itemsList3";
            case "funky":
                return "itemsList4";
            case "sharp":
                return "itemsList5";
            case "iconic":
                return "itemsList6";
            case "fashion":
                return "itemsList7";
            case "classy":
                return "itemsList8";
            default:
                return itemName;
        }
    }

    speechSynthesis.onvoiceschanged = () => {
        const voices = speechSynthesis.getVoices();
        if (voices.length > 0) {
            console.log('Voices loaded.');
        } else {
            console.log('No voices available for speech synthesis.');
        }
    };
    function addToCartButton(itemName) {
        const quantity = parseInt(document.getElementById(`quantity_${itemName}`).value);
        const price = parseInt(document.querySelector(`[data-name="${itemName}"]`).getAttribute('data-price'));
        
        const totalPrice = quantity * price;

        addToTransaction(itemName, quantity, totalPrice);
    }

    function addToTransaction(itemName, quantity, totalPrice) {
        alert(`${quantity} ${itemName} has been added to cart successfully.`);

        $.ajax({
            type: 'POST',
            url: 'insert-transaction.php',
            data: {
                itemName: itemName,
                quantity: quantity,
                totalPrice: totalPrice
            },
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
    
    function addToCart(voiceCommand) {
        const currentTime = new Date().getTime();
        const timeDifference = currentTime - lastCommandTime;
        if (timeDifference < 1000) {
            return;
        }
        lastCommandTime = currentTime; 

        const match = voiceCommand.match(/add (.+) to cart/i); 
        if (match && match[1]) {
            let itemName = match[1].trim().toLowerCase(); 
            console.log("Item Name from Voice Command:", itemName);

            let itemsListId = getItemListId(itemName);
            let itemsList = document.getElementById(itemsListId);

            selectedItem = Array.from(itemsList.children).find(item => {
                const name = item.getAttribute('data-name').toLowerCase(); 
                console.log("Item Name in List:" , name);
                return name === itemName; 

            });

            if (selectedItem) {
                let name = selectedItem.getAttribute('data-name'); 
                let price = selectedItem.getAttribute('data-price');

                const utterance = new SpeechSynthesisUtterance();
                utterance.text = `How many ${name} would you like?`;
                utterance.voice = speechSynthesis.getVoices()[0]; 
                speechSynthesis.speak(utterance);
                recognition.stop();

                    utterance.onend = () => {
                        console.log('Quantity prompt spoken:', utterance.text); 
                        recognition.start(); 
                    };

                
                recognition.onresult = function handleResult(event) {
                    console.log('result handling:')
                    const quantity = parseInt(event.results[event.results.length - 1][0].transcript.trim());
                    if (!isNaN(quantity) && quantity > 0) {
                        addToTransaction(itemName, quantity, "", "", "");
                        for (let i = 0; i < quantity; i++) {
                            const listItem = document.createElement('div');
                            listItem.textContent = `${name}`;
                            console.log(listItem);
                            cart.appendChild(listItem);
                        }
                        outputDiv.textContent = `Added ${quantity} ${name} to cart.`;
                        console.log(`Added ${quantity} ${name} to cart.`);
                    } else {
                        outputDiv.textContent = `Invalid quantity for ${name}. Please try again.`;
                        console.log(`Invalid quantity for ${name}. Please try again.`);
                        recognition.start();
                    }

                    recognition.onresult = null;
                    recognition.onend = null;
                    selectedItem = null;
                };
            } else {
                outputDiv.textContent = `Item "${itemName}" not found.`;
                console.log('Item not found');
                recognition.start();
            }
        } else {
            console.log('Invalid command');
            recognition.start();
        }
    }
        startButton.addEventListener('click', toggleRecognition);

        document.addEventListener('keydown', (event) => {
            if (event.key === ' ' || event.key === 'Space') { 
                event.preventDefault(); 
                toggleRecognition(); 
            }
        });
