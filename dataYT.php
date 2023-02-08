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


                        </div>
                    </div>
                    <div class="col w-50">
                        <div class="card ">
                            <div id="chart2" class="rounded rounded-5 py-4"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const apiKey = "AIzaSyAjEtD_5L5nvy-iihOk7soj9QSBJVhIF2Q";
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
                        type: "column"
                    },
                    title: {
                        text: "Analiza e kanalit - YouTube"
                    },
                    xAxis: {
                        categories: ['Abonent']
                    },
                    yAxis: {
                        title: {
                            text: 'Vlerat'
                        }
                    },
                    series: [{
                        name: "Te dhenat",
                        data: [parseInt(subscriberCount)]
                    }]
                });

                Highcharts.chart("chart2", {
                    chart: {
                        type: "column"
                    },
                    title: {
                        text: "Analiza e kanalit - YouTube"
                    },
                    xAxis: {
                        categories: ['Videot']
                    },
                    yAxis: {
                        title: {
                            text: 'Vlerat'
                        }
                    },
                    series: [{
                        name: "Te dhenat",
                        data: [parseInt(videoCount)]
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
<?php include 'partials/footer.php' ?>