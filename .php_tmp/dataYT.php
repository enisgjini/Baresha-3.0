<?php include 'partials/header.php' ?>
<script src="https://d3js.org/d3.v7.min.js"></script>


<style>
    #card {
        width: 200px;
        height: 150px;
        background-color: #f2f2f2;
        position: absolute;
    }

    #header {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
    }

    #content {
        padding: 10px;
    }

    #deleteBtn {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }
</style>

<!-- const apiKey = "AIzaSyCvc0tIeB58Sz0hpDFSEYxDXFT8tg0VGGQ"; -->
<!-- const channelId = "UCV6ZBT0ZUfNbtZMbsy-L3CQ"; -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container"><br>
                <button id="deleteButton" class="btn btn-light shadow-1 border border-1 mb-1">Hide Chart</button>

                <div class="col my-3">

                    <?php
                    echo '<select id="video-select" name="select" class="form-select w-50" onchange="updateChannelId(this.value)">';
                    $result = $conn->query("SELECT * FROM klientet ORDER BY emri ASC");
                    $options = '';
                    while ($row = mysqli_fetch_array($result)) {
                        $options .= '<option value="' . htmlspecialchars($row['youtube']) . '">'
                            . htmlspecialchars($row['emri'])
                            . '</option>';
                    }
                    echo $options;

                    echo '</select>';

                    ?>
                    <br>

                    <div class="row">
                        <div class="col">
                            <p id="selectedOptionText" class="shadow-2 border border-1 rounded py-3 bg-white px-3"></p>
                        </div>
                        <div class="col">
                            <p id="selectedOptionText2" class="shadow-2 border border-1 rounded py-3 bg-white px-3"></p>
                        </div>
                        <div class="col">
                            <p id="selectedOptionText2" class="shadow-2 border border-1 rounded py-3 bg-white px-3"></p>
                        </div>
                    </div>

                </div>




                <div class="row">
                    <div class="col w-50">
                        <div class="card ">
                            <div id="chart" class="rounded rounded-5 py-4"></div>
                            <script>
                                const apiKey = "AIzaSyAztDJAJfQro8zUj5cKcecJjLjovAgA6S0";
                                let channelId = "UCV6ZBT0ZUfNbtZMbsy-L3CQ";
                                let videoContainer = document.getElementById("videoContainer");

                                function updateChannelId(value) {
                                    channelId = value;
                                    fetch(`https://www.googleapis.com/youtube/v3/channels?part=statistics&id=${channelId}&key=${apiKey}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log(data);
                                            const viewCount = data.items[0].statistics.viewCount;
                                            const subscriberCount = data.items[0].statistics.subscriberCount;
                                            const videoCount = data.items[0].statistics.videoCount;

                                            Highcharts.chart("chart", {
                                                chart: {
                                                    type: "area"
                                                },
                                                title: {
                                                    text: "Analiza e kanalit - YouTube"
                                                },
                                                xAxis: {
                                                    categories: ['Abonent', 'Videot']
                                                },
                                                yAxis: {
                                                    title: {
                                                        text: 'Vlerat'
                                                    }
                                                },
                                                series: [{
                                                    name: "Te dhenat",
                                                    data: [parseInt(subscriberCount), parseInt(videoCount)]
                                                }]
                                            });


                                        });

                                    const selectElement = document.querySelector("select");
                                    const shfaqjaEEmrit = "Emri i artistit : " + selectElement.options[selectElement.selectedIndex].text;
                                    document.getElementById("selectedOptionText").innerHTML = shfaqjaEEmrit;


                                    const kanalID = "ID e kanalit : " + selectElement.options[selectElement.selectedIndex].value;
                                    document.getElementById("selectedOptionText2").innerHTML = kanalID;


                                }
                            </script>
                        </div>
                    </div>
                    <div class="col w-50">
                        <h2>Enis</h2>
                        <div id="revenue"></div>
                        <div id="card" class="card">
                            <div id="header">Card Header</div>
                            <div id="content">Card Content</div>
                            <button id="deleteBtn">Delete</button>
                        </div>




                    </div>
                    <script>
                        // Replace {YOUR_CLIENT_ID} and {YOUR_REDIRECT_URI} with your OAuth 2.0 client ID and redirect URI
                        // 832897216603-alf98kgeje3867l1k8cie85t72oc1aj9.apps.googleusercontent.com
                        // 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
                        const clientId = '832897216603-alf98kgeje3867l1k8cie85t72oc1aj9.apps.googleusercontent.com';
                        const redirectUri = 'http://localhost/Baresha_3.0/dataYT.php';

                        // Request user authorization
                        const authUrl = new URL('https://accounts.google.com/o/oauth2/v2/auth');
                        authUrl.searchParams.set('client_id', clientId);
                        authUrl.searchParams.set('redirect_uri', redirectUri);
                        authUrl.searchParams.set('scope', 'https://www.googleapis.com/auth/yt-analytics.readonly');
                        authUrl.searchParams.set('response_type', 'code');

                        // Check if the user has granted access
                        if (!window.location.search.includes('code')) {
                            window.location.href = authUrl.toString();
                        } else {
                            // Extract the authorization code from the query string of the redirect URL
                            const code = new URL(window.location.href).searchParams.get('code');

                            // Exchange the authorization code for an access token
                            fetch('https://oauth2.googleapis.com/token', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded'
                                    },
                                    body: new URLSearchParams({
                                        code,
                                        client_id: clientId,
                                        redirect_uri: redirectUri,
                                        grant_type: 'authorization_code',
                                    }),
                                })
                                .then(response => response.json())
                                .then(token => {
                                    // Make the authorized API request
                                    fetch('https://youtubeanalytics.googleapis.com/v2/reports', {
                                            headers: {
                                                'Authorization': `Bearer ${token.access_token}`
                                            },
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log(data);
                                        });
                                });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include 'partials/footer.php' ?>


<script>
    const card = document.querySelector("#card");
    const deleteBtn = document.querySelector("#deleteBtn");
    const showBtn = document.querySelector("#showBtn");

    let isDragging = false;
    let currentX;
    let currentY;
    let initialX;
    let initialY;
    let xOffset = 0;
    let yOffset = 0;

    card.addEventListener("mousedown", dragStart);
    card.addEventListener("mouseup", dragEnd);
    card.addEventListener("mousemove", drag);

    deleteBtn.addEventListener("click", deleteCard);
    showBtn.addEventListener("click", showCard);

    function dragStart(e) {
        initialX = e.clientX - xOffset;
        initialY = e.clientY - yOffset;

        isDragging = true;
    }

    function dragEnd(e) {
        initialX = currentX;
        initialY = currentY;

        isDragging = false;
    }

    function drag(e) {
        if (isDragging) {
            e.preventDefault();
            currentX = e.clientX - initialX;
            currentY = e.clientY - initialY;

            xOffset = currentX;
            yOffset = currentY;

            setTranslate(currentX, currentY, card);
        }
    }

    function setTranslate(xPos, yPos, el) {
        el.style.transform = "translate3d(" + xPos + "px, " + yPos + "px, 0)";
    }

    function deleteCard() {
        card.style.display = "none";
        showBtn.style.display = "block";
    }

    function showCard() {
        card.style.display = "block";
        showBtn.style.display = "none";
    }
</script>