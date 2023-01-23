<style>
    #search-result {
        color: blue;
    }

    #search-button {
        width: 100;
    }

    #search-result::before {
        content: "...";
        animation: typing 2s infinite;
    }

    #conversation-history {
        overflow-y: scroll;
        max-height: 300px;
        border: 1px solid #ccc;
        padding: 10px;
        display: flex;
        flex-wrap: wrap;
        align-content: flex-start;

    }


    @keyframes typing {
        0% {
            width: 0;
        }

        50% {
            width: 10px;
        }

        100% {
            width: 0;
        }
    }
</style>
<div id="search-container">
    <input type="text" id="search-input">
    <button id="search-button">Search</button>

    <button id="stop-button">Stop</button>
    <button id="clear-button">Clear</button>

</div>
<div id="search-result"></div>
<div class="jumbotron" id="conversation-history">
</div>


<script>
    let isRunning = true;

    const searchButton = document.getElementById("search-button");
    const searchInput = document.getElementById("search-input");
    const searchResult = document.getElementById("search-result");
    let currentIndex = 0;
    const apiKey = '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';

    function type() {
        if (currentIndex < response.length && isRunning) {
            searchResult.innerHTML += response[currentIndex];
            currentIndex++;
            setTimeout(type, 100);
        } else {
            6
            clearInterval();
        }
    }


    searchButton.addEventListener("click", function() {
        const userInput = searchInput.value;

        if (userInput.trim() === "") {
            alert("Please enter a query to search");
            return;
        }
        searchResult.innerHTML = "Loading...";
        search(userInput)
            .then((result) => {
                response = result;
                type();
            })
            .catch((error) => {
                searchResult.innerHTML = "Error: " + error;
            });
    });

    async function search(query) {
        const response = await fetch('https://api.openai.com/v1/engines/text-davinci-003/completions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${apiKey}`
            },
            body: JSON.stringify({
                prompt: query,
                max_tokens: 100
            })
        });
        if (!response.ok) {
            throw new Error(response.statusText);
        }
        const data = await response.json();
        return data.choices[0].text;
    }

    const stopButton = document.getElementById("stop-button");
    stopButton.addEventListener("click", function() {
        isRunning = false;
    });

    const clearButton = document.getElementById("clear-button");
    clearButton.addEventListener("click", function() {
        localStorage.clear();
        searchInput.value = "";
        searchResult.innerHTML = "";
        isRunning = false;
    });

    function addToConversationHistory(message) {
        const history = document.getElementById("conversation-history");
        const p = document.createElement("p");
        p.innerText = message;
        history.appendChild(p);
    }
    searchButton.addEventListener("click", function() {
        const userInput = searchInput.value;
        addToConversationHistory("User: " + userInput);
        search(userInput)
            .then((result) => {
                response = result;
                addToConversationHistory("ChatGPT: " + response);
                type();
            })
            .catch((error) => {
                searchResult.innerHTML = "Error: " + error;
            });
    });
</script>